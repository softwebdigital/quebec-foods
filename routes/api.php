<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PackageController;
use App\Http\Controllers\OnlinePaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/payment/webhook', [OnlinePaymentController::class, 'handlePaymentWebhook']);
Route::post('/payment/flw/webhook', [OnlinePaymentController::class, 'handleFlwWebhook']);

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/2fa/send', [AuthController::class, 'sendTwoFactorOTP'])->middleware('throttle:3,1');
    Route::post('/2fa', [AuthController::class, 'enableOrDisableTwoFactor'])->middleware('throttle:3,1');
    Route::post('/2fa/verify', [AuthController::class, 'verifyTwoFactor']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'me']);

    Route::post('/password/email', [AuthController::class, 'sendPasswordResetToken'])->middleware('throttle:3,1');
    Route::post('/password/token', [AuthController::class, 'verifyPasswordResetToken']);
    Route::post('/password/reset', [AuthController::class, 'resetPassword']);
    Route::post('/password/change', [AuthController::class, 'changePassword']);

    Route::post('/email/verify', [AuthController::class, 'verifyEmail']);
    Route::post('/email/resend', [AuthController::class, 'resendEmailVerificationLink'])->middleware('throttle:3,1');

    Route::post('/profile/update', [AuthController::class, 'profile']);
    Route::post('/profile/photo', [AuthController::class, 'photo'])->middleware('throttle:3,1');
});

Route::prefix('packages')->group(function () {
    Route::get('/', [PackageController::class, 'index']);
    Route::get('/{package}', [PackageController::class, 'show']);
});
