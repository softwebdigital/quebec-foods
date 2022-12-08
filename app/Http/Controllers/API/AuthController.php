<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\VerifyTokenRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Notifications\TwoFactorCode;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AuthController extends Controller
{
    public function __construct(protected UserRepository $userRepository)
    {
        self::middleware(['auth:sanctum'])->except(['login', 'register', 'sendTwoFactorOTP', 'verifyTwoFactor', 'sendPasswordResetToken', 'verifyPasswordResetToken', 'resetPassword']);
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $credentials = $request->validated();
        $credentials['password'] = Hash::make($credentials['password']);
        $credentials['code'] = User::generateUserCode();
        $credentials['ref_code'] = User::getRefCode();
        $user = $this->userRepository->create($credentials);
        $user->wallet()->create(['balance' => 0]);
        if ($ref = $request->input('ref')) {
            $referee = User::query()->where('ref_code', $ref)->first();
            $referee?->referrals()->create(['referred_id' => $user['id']]);
        }
        $user->sendEmailVerificationNotificationAPI();
        return self::returnDataWithToken(user: $user, message: 'Registration Successful');
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();
        if (!Auth::attempt($credentials))
            return $this->failure(message: 'Invalid login credentials', status: 404);
        $user = $this->userRepository->findByColumn('email', $credentials['email']);
        if ($user['two_factor_enabled']) {
            $user->generateTwoFactorCode();
            $user->notify(new TwoFactorCode(true));
            return $this->success(message: 'A two factor otp has been sent to your mail!', data: ['user' => new UserResource($user)]);
        }
        return self::returnDataWithToken(user: $user, message: 'Login Successful');
    }

    public function sendTwoFactorOTP(Request $request): JsonResponse
    {
        $request->validate(['email' => ['required', 'exists:users']]);
        $user = $this->userRepository->findByColumn('email', $request['email']);
        if ($user['two_factor_enabled']) {
            $user->generateTwoFactorCode();
            $user->notify(new TwoFactorCode(true));
            return $this->success(message: 'A two factor otp has been sent to your mail!', data: new UserResource($user));
        }
        return $this->failure('OTP not sent!','Two factor authentication not enabled by this user.', 400);
    }

    public function verifyTwoFactor(VerifyTokenRequest $request): JsonResponse
    {
        $user = $this->userRepository->findByColumn('email', $request->input('email'));
        if ($request->input('token') != $user['two_factor_code'] || now()->gt($user['two_factor_expires_at']))
            return $this->failure(message: 'Token is invalid', status: 400);
        $user->resetTwoFactorCode();
        return self::returnDataWithToken($user, 'Login Successful');
    }

    public function enableOrDisableTwoFactor(Request $request): JsonResponse
    {
        $user = $request->user();
        $action = !$user['two_factor_enabled'];
        $this->userRepository->update($request->user()->id, ['two_factor_enabled' => $action]);
        return $this->success(message: 'Two factor authentication '. ($action ? 'enabled' : 'disabled') .'!');
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return $this->success(message: 'Logout successful');
    }

    public function me(Request $request): JsonResponse
    {
        return $this->success(data: new UserResource($request->user()));
    }

    public function sendPasswordResetToken(Request $request): JsonResponse
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email']
        ], [
            'email.exists' => 'We could not find a user with this email address'
        ]);
        $user = $this->userRepository->findByColumn('email', $request->input('email'));
        $user->sendPasswordResetNotificationAPI();
        return $this->success(message: 'We have emailed you a password reset otp');
    }

    public function verifyPasswordResetToken(VerifyTokenRequest $request): JsonResponse
    {
        $user = $this->userRepository->findByColumn('email', $request->input('email'));
        if (!Hash::check($request->input('token'), $user['reset_otp']))
            return $this->failure(message: 'Token is invalid', status: 400);
        if (now()->gt(Carbon::make($user['reset_otp_expiry'])->addMinutes(10)))
            return $this->failure(message: 'Token has expired', status: 400);
        return $this->success(message: 'Token verified successfully');
    }

    public function resetPassword(LoginRequest $request): JsonResponse
    {
        $user = $this->userRepository->findByColumn('email', $request->input('email'));
        $data['password'] = Hash::make($request->input('password'));
        $data['reset_otp'] = null;
        $data['reset_otp_expiry'] = null;
        $this->userRepository->update($user->id, $data);
        return $this->success(message: 'Password reset successful!');
//        return self::returnDataWithToken(user: $user, message: 'Password reset successful!');
    }

    public function resendEmailVerificationLink(Request $request): JsonResponse
    {
        $user = $request->user();
        if ($user['email_verified_at'])
            return $this->failure(message: 'Email already verified', status: 400);
        $user->sendEmailVerificationNotificationAPI();
        return $this->success(message: 'Email verification otp resent to '.$user['email']);
    }

    public function verifyEmail(Request $request): JsonResponse
    {
        $user = $request->user();
        $request->validate(['token' => ['required']]);
        if ($user['email_verified_at'])
            return $this->failure(message: 'Email already verified!', status: 400);
        if (!Hash::check($request->input('token'), $user['otp']))
            return $this->failure(message: 'Email not verified, token is invalid', status: 400);
        if (now()->gt($user['otp_expiry']))
            return $this->failure(message: 'Email not verified, token has expired', status: 400);
        $data['email_verified_at'] = now();
        $data['otp'] = null;
        $data['otp_expiry'] = null;
        $this->userRepository->update($user->id, $data);
        return $this->success(message: 'Email verified successfully');
    }

    public function changePassword(Request $request): JsonResponse
    {
        $request->validate([
            'old_password' => ['required', 'string'],
            'new_password' => ['required', 'min:6'],
        ]);
        if (!Hash::check($request->input('old_password'), $request->user()['password']))
            return $this->failure(message: 'Old password incorrect', status: 400);
        if (Hash::check($request->input('new_password'), $request->user()['password']))
            return $this->failure(message: 'New password is similar to old password', status: 400);
        $this->userRepository->update($request->user()->id, ['password' => Hash::make($request->input('new_password'))]);
        return $this->success(message: 'Password updated successfully', data: new UserResource($request->user()));
    }

    public function profile(UpdateProfileRequest $request): JsonResponse
    {
        $this->userRepository->update($request->user()->id, $request->validated());
        $user = $this->userRepository->find($request->user()->id);
        if ($user['gotMail'] == 0) {
            NotificationController::sendWelcomeEmailNotification($user, true);
            $user->update(['gotMail' => 1]);
        }
        return $this->success('Profile updated successfully!', new UserResource($user));
    }

    public function photo(Request $request): JsonResponse
    {
        $user = $request->user();
        $request->validate(['avatar' => 'required|max:2048|file|mimes:jpg,png,jpeg']);
        $destinationPath = 'assets/photos';
        HomeController::createDirectoryIfNotExists($destinationPath);
        $transferImage = $user['id'].'-'. time() . '.' . $request->file('avatar')->getClientOriginalExtension();
        $image = Image::make($request->file('avatar'));
        $image->save($destinationPath . '/' . $transferImage, 40);
        $avatar = $destinationPath ."/".$transferImage;
        $this->userRepository->update($user->id, ['avatar' => $avatar]);
        $user = $this->userRepository->find($user->id);
        if ($oldAvatar = $user['avatar']) {
            try { unlink($oldAvatar); } catch (Exception $e) {}
        }
        return $this->success('Profile photo updated successfully!', new UserResource($user));
    }

    private function returnDataWithToken(User $user, string $message): JsonResponse
    {
        $token = $user->createToken(request('token_name') ?? 'app')->plainTextToken;
        return $this->success(message: $message, data: ['user' => new UserResource($user), 'token' => $token]);
    }
}
