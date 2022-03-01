<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});

Auth::routes(['verify' => true]);

Route::get('/verify/resend', [App\Http\Controllers\Auth\TwoFactorController::class, 'resend'])->name('verify.resend');
Route::get('/verify', [App\Http\Controllers\Auth\TwoFactorController::class, 'index'])->name('verify.index');
Route::post('/verify', [App\Http\Controllers\Auth\TwoFactorController::class, 'store'])->name('verify.store');

Route::group(['middleware' => ['auth', 'verified', 'two_factor']], function() {
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('profile.update');
    Route::put('/2fa/update', [App\Http\Controllers\HomeController::class, 'update2fa'])->name('2fa.update');
    Route::post('/password/custom/update', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('password.custom.update');

    Route::get('/account/overview', [App\Http\Controllers\HomeController::class, 'accountOverview'])->name('account.overview');
    Route::get('/overview/{type}/investments', [App\Http\Controllers\HomeController::class, 'showUserInvestments'])->where('type', 'farm|plant')->name('user.investments');
    Route::get('/overview/transactions', [App\Http\Controllers\HomeController::class, 'showTransactions'])->name('user.transactions');
    Route::get('/overview/wallet', [App\Http\Controllers\HomeController::class, 'showWallet'])->name('user.wallet');
    Route::get('/overview/referrals', [App\Http\Controllers\HomeController::class, 'showReferrals'])->name('user.referrals');
    Route::get('/overview/{type}/investments/{investment}/show', [App\Http\Controllers\InvestmentController::class, 'showUserInvestment'])->where('type', 'farm|plant')->name('user.investment.show');
    Route::post('/overview/invest/store', [App\Http\Controllers\InvestmentController::class, 'store'])->name('user.invest.store');

    Route::post('/banks', [App\Http\Controllers\BankAccountsController::class, 'store'])->name('bank.store');
    Route::delete('/banks/{bank}', [App\Http\Controllers\BankAccountsController::class, 'destroy'])->name('bank.destroy');

    Route::group(['middleware' => ['profile_completed']], function () {
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
        Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications');
        Route::get('/notifications/{notification?}/show', [App\Http\Controllers\NotificationController::class, 'show'])->name('notifications.show');
        Route::group(['prefix' => '/packages/{type}', 'where' => ['type' => 'plant|farm']], function() {
            Route::get('/', [\App\Http\Controllers\PackageController::class, 'index'])->name('packages');
        });
        Route::group(['where' => ['type' => 'all|withdrawal|deposit|payout|investment']], function() {
            Route::get('/transactions/{type?}', [App\Http\Controllers\TransactionController::class, 'index'])->name('transactions');
        });
        Route::group(['prefix' => '/investments/{type}', 'where' => ['type' => 'plant|farm']], function() {
            Route::group(['prefix' => '/{filter}', 'where' => ['filter' => 'all|pending|active|cancelled|settled']], function() {
                Route::get('/', [App\Http\Controllers\InvestmentController::class, 'index'])->name('investments');
            });;
            Route::get('/create', [App\Http\Controllers\InvestmentController::class, 'invest'])->name('invest');
            Route::get('/{investment}/show', [App\Http\Controllers\InvestmentController::class, 'show'])->name('investments.show');
        });
        Route::post('/invest', [App\Http\Controllers\InvestmentController::class, 'store'])->name('invest.store');
        Route::get('/wallet', [App\Http\Controllers\WalletController::class, 'index'])->name('wallet');
        Route::post('/deposit', [App\Http\Controllers\TransactionController::class, 'deposit'])->name('deposit');
        Route::post('/withdraw', [App\Http\Controllers\TransactionController::class, 'withdraw'])->name('withdraw');
        Route::get('/referrals', [App\Http\Controllers\ReferralController::class, 'index'])->name('referrals');
    });

    Route::get('/faqs', [App\Http\Controllers\FaqController::class, 'index'])->name('faq');
});
