<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BankController;
use App\Http\Controllers\API\InvestmentController;
use App\Http\Controllers\API\NotificationController;
use App\Http\Controllers\API\PackageController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\HomeController;
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

Route::get('/dashboard', [HomeController::class, 'index']);
Route::get('/currency', [HomeController::class, 'currency']);
Route::get('/account/details', [HomeController::class, 'bankAccount']);
Route::get('/countries', [HomeController::class, 'countries']);

Route::prefix('banks')->group(function () {
    Route::get('/', [BankController::class, 'index']);
    Route::post('/', [BankController::class, 'store']);
    Route::get('/{bank}/details', [BankController::class, 'show']);
    Route::put('/{bank}', [BankController::class, 'update']);
    Route::delete('/{bank}', [BankController::class, 'delete']);
    Route::post('/verify', [BankController::class, 'verify'])->middleware('throttle:3,1');
    Route::get('/list', [BankController::class, 'list']);
});

Route::prefix('investments')->group(function() {
    Route::get('/', [InvestmentController::class, 'index']);
    Route::post('/', [InvestmentController::class, 'store']);
    Route::get('/{investment}', [InvestmentController::class, 'show']);
});

Route::prefix('notifications')->group(function () {
    Route::get('/', [NotificationController::class, 'index']);
    Route::get('/read', [NotificationController::class, 'read']);
    Route::get('/unread', [NotificationController::class, 'unread']);
    Route::get('/{id}/details', [NotificationController::class, 'show']);
    Route::post('/{id}/read', [NotificationController::class, 'markAsRead']);
    Route::post('/read/all', [NotificationController::class, 'markAllAsRead']);
});

Route::prefix('packages')->group(function () {
    Route::get('/', [PackageController::class, 'index']);
    Route::get('/{package}', [PackageController::class, 'show']);
});

Route::prefix('transactions')->group(function() {
    Route::get('/', [TransactionController::class, 'index']);
    Route::get('/{transaction}', [TransactionController::class, 'show']);
});

Route::prefix('wallet')->group(function() {
    Route::get('/', [TransactionController::class, 'wallet']);
    Route::get('/history', [TransactionController::class, 'walletHistory']);
    Route::post('/deposit', [TransactionController::class, 'deposit']);
    Route::post('/withdraw', [TransactionController::class, 'withdraw']);
    Route::post('/token', [TransactionController::class, 'sendWithdrawalToken']);
});
