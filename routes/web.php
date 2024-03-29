<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\OnlinePaymentController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WalletController;
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

// Route::get('/pdf', function(){
//     return view('pdf.certificate');
// });

Route::get('/', [App\Http\Controllers\StaticPageController::class, 'home'])->name('static.home');
Route::get('/about', [App\Http\Controllers\StaticPageController::class, 'about'])->name('static.about');
Route::get('/contact', [App\Http\Controllers\StaticPageController::class, 'contact'])->name('static.contact');
Route::get('/faqs', [App\Http\Controllers\StaticPageController::class, 'faq'])->name('static.faq');
Route::get('/farm-estate', [App\Http\Controllers\StaticPageController::class, 'farm'])->name('static.farm');
Route::get('/privacy-policy', [App\Http\Controllers\StaticPageController::class, 'privacy'])->name('static.privacy');
Route::get('/processing-plant', [App\Http\Controllers\StaticPageController::class, 'plant'])->name('static.plant');
Route::get('/terms', [App\Http\Controllers\StaticPageController::class, 'terms'])->name('static.terms');
Route::get('/tractor-investment', [App\Http\Controllers\StaticPageController::class, 'tractor'])->name('static.tractor');
Route::get('/disclaimer', [App\Http\Controllers\StaticPageController::class, 'disclaimer'])->name('static.disclaimer');
Route::get('/referal', [App\Http\Controllers\StaticPageController::class, 'referal'])->name('static.referal');
Route::get('/team', [App\Http\Controllers\StaticPageController::class, 'teams'])->name('static.team');
Route::get('/webinar', [App\Http\Controllers\StaticPageController::class, 'webinar'])->name('static.webinar');


Route::post('/contact/send', [App\Http\Controllers\ContactUsController::class, 'sendMail'])->name('static.post.contact');

Auth::routes(['verify' => true]);

Route::get('/verify/resend', [App\Http\Controllers\Auth\TwoFactorController::class, 'resend'])->name('verify.resend');
Route::get('/verify', [App\Http\Controllers\Auth\TwoFactorController::class, 'index'])->name('verify.index');
Route::post('/verify', [App\Http\Controllers\Auth\TwoFactorController::class, 'store'])->name('verify.store');

Route::group(['middleware' => ['auth', 'active_user', 'verified', 'two_factor']], function() {
    Route::prefix('account')->group(function () {
        Route::post('/token', [HomeController::class, 'sendDeactivationToken'])->name('account.token');
        Route::post('/deactivate', [HomeController::class, 'deactivate'])->name('account.deactivate');
    });

    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/profile/identification', [HomeController::class, 'profile_id'])->name('profile.identification');
    Route::post('/profile/update', [HomeController::class, 'updateProfile'])->name('profile.update');
    Route::put('/2fa/update', [HomeController::class, 'update2fa'])->name('2fa.update');
    Route::post('/password/custom/update', [HomeController::class, 'updatePassword'])->name('password.custom.update');


    Route::post('/banks', [App\Http\Controllers\BankAccountsController::class, 'store'])->name('bank.store');
    Route::post('/international/banks', [App\Http\Controllers\BankAccountsController::class, 'storeInt'])->name('internationalBank.store');
    Route::delete('/banks/{bank}', [App\Http\Controllers\BankAccountsController::class, 'destroy'])->name('bank.destroy');

    Route::post('/documents', [App\Http\Controllers\DocumentController::class, 'store'])->name('document.store');

    Route::group(['middleware' => ['profile_completed']], function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

        Route::get('/account/overview', [HomeController::class, 'accountOverview'])->name('account.overview');
        Route::get('/overview/{type}/investments', [HomeController::class, 'showUserInvestments'])->where('type', 'farm|plant|tractor')->name('user.investments');
        Route::get('/overview/transactions', [HomeController::class, 'showTransactions'])->name('user.transactions');
        Route::get('/overview/wallet', [HomeController::class, 'showWallet'])->name('user.wallet');
        Route::get('/overview/referrals', [HomeController::class, 'showReferrals'])->name('user.referrals');
        Route::get('/overview/{type}/investments/{investment}/show', [App\Http\Controllers\InvestmentController::class, 'showUserInvestment'])->where('type', 'farm|plant|tractor')->name('user.investment.show');
        Route::post('/overview/invest/store', [App\Http\Controllers\InvestmentController::class, 'store'])->name('user.invest.store');

        Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications');
        Route::get('/notifications/{notification?}/show', [App\Http\Controllers\NotificationController::class, 'show'])->name('notifications.show');
        Route::get('/notifications/read', [App\Http\Controllers\NotificationController::class, 'read'])->name('notifications.read');

        Route::group(['prefix' => '/packages'], function() {
            Route::get('/', [PackageController::class, 'index'])->name('packages');
            Route::get('/{package}/show', [PackageController::class, 'show'])->name('packages.show');
        });

        Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'index'])->name('transactions');

        Route::group(['prefix' => '/investments'], function() {
            Route::group(['where' => ['type' => 'farm|plant|tractor']], function () {
                Route::get('/{type}', [InvestmentController::class, 'index'])->name('investments');
            });
            Route::get('/create', [InvestmentController::class, 'invest'])->name('invest');
            Route::get('/{investment}/show', [InvestmentController::class, 'show'])->name('investments.show');
            Route::put('/{investment}/rollover/update', [InvestmentController::class, 'updateRollover'])->name('investment.update.rollover');
        });
        Route::post('/invest', [InvestmentController::class, 'store'])->name('invest.store');
        Route::get('/wallet', [WalletController::class, 'index'])->name('wallet');
        Route::post('/deposit', [TransactionController::class, 'deposit'])->name('deposit');
        Route::post('/withdraw', [TransactionController::class, 'withdraw'])->name('withdraw');
        Route::get('/referrals', [ReferralController::class, 'index'])->name('referrals');

        Route::post('/withdrawal/send-token', [TransactionController::class, 'withdrawalToken'])->name('withdrawal.token');
        Route::post('/withdraw/resend-token', [TransactionController::class, 'resendToken'])->name('withdrawalToken.resend');
    });

    Route::get('/app/faqs', [FaqController::class, 'index'])->name('faq');

    Route::get('/payment/{gateway}/callback', [OnlinePaymentController::class, 'handlePaymentCallback'])->name('payment.callback');
    Route::get('/payment/initiate', [OnlinePaymentController::class, 'initiatePayment'])->name('payment.initiate');

});
