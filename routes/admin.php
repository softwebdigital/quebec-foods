<?php

use App\Models\Admin;
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

Route::get('/login', [\App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('login.submit');
Route::get('/password/reset', [\App\Http\Controllers\Auth\AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/reset', [\App\Http\Controllers\Auth\AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [\App\Http\Controllers\Auth\AdminResetPasswordController::class, 'showResetForm'])->name('password.change.show');
Route::post('/password/reset/change', [\App\Http\Controllers\Auth\AdminResetPasswordController::class, 'reset'])->name('password.update');

Route::group(['middleware' => ['auth:admin']], function (){
    Route::post('/logout', [\App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [\App\Http\Controllers\Admin\HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [App\Http\Controllers\Admin\HomeController::class, 'profile'])->name('profile');

    Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings');
    Route::post('/setting/save', [App\Http\Controllers\Admin\SettingController::class, 'saveSettings'])->name('settings.save');

    Route::post('/profile/update', [App\Http\Controllers\Admin\HomeController::class, 'updateProfile'])->name('profile.update');
    Route::post('/password/custom/update', [App\Http\Controllers\Admin\HomeController::class, 'changePassword'])->name('password.custom.update');
    Route::post('/setting/bank/update', [App\Http\Controllers\Admin\SettingController::class, 'updateBankDetails'])->name('bank.update');

    Route::get('/admins', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admins');
    Route::get('/admins/create', [App\Http\Controllers\Admin\AdminController::class, 'create'])->name('admins.create');
    Route::post('/admins/store', [App\Http\Controllers\Admin\AdminController::class, 'store'])->name('admins.store');
    Route::put('/admins/{admin}/block', [App\Http\Controllers\Admin\AdminController::class, 'block'])->name('admins.block');
    Route::put('/admins/{admin}/unblock', [App\Http\Controllers\Admin\AdminController::class, 'unblock'])->name('admins.unblock');
    Route::post('/admins/role/change', [App\Http\Controllers\Admin\AdminController::class, 'changeRole'])->name('admins.role.change');

    Route::get('/roles', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('roles');
    Route::get('/roles/create', [App\Http\Controllers\Admin\RoleController::class, 'create'])->name('roles.create');
    Route::get('/roles/{role?}/edit', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/store', [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('roles.store');
    Route::put('/roles/{role?}/update', [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{role?}/destroy', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('roles.destroy');

    Route::get('/users/{type?}', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users');
    Route::get('/users/{user}/show', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/{type}/investments', [App\Http\Controllers\Admin\UserController::class, 'showUserInvestments'])->where('type', 'farm|plant')->name('users.investments');
    Route::get('/users/{user}/transactions', [App\Http\Controllers\Admin\UserController::class, 'showTransactions'])->name('users.transactions');
    Route::get('/users/{user}/wallet', [App\Http\Controllers\Admin\UserController::class, 'showWallet'])->name('users.wallet');
    Route::get('/users/{user}/referrals', [App\Http\Controllers\Admin\UserController::class, 'showReferrals'])->name('users.referrals');
    Route::get('/users/{user}/invest', [App\Http\Controllers\Admin\InvestmentController::class, 'invest'])->name('users.invest');
    Route::get('/users/{user}/{type}/investments/{investment}/show', [App\Http\Controllers\Admin\InvestmentController::class, 'showUserInvestment'])->where('type', 'farm|plant')->name('users.investment.show');
    Route::put('/users/{user}/block', [App\Http\Controllers\Admin\UserController::class, 'block'])->name('users.block');
    Route::put('/users/{user}/unblock', [App\Http\Controllers\Admin\UserController::class, 'unblock'])->name('users.unblock');
    Route::post('/users/invest/store', [App\Http\Controllers\Admin\InvestmentController::class, 'store'])->name('users.invest.store');
    Route::post('/deposit', [App\Http\Controllers\Admin\TransactionController::class, 'deposit'])->name('deposit');
    Route::post('/withdraw', [App\Http\Controllers\Admin\TransactionController::class, 'withdraw'])->name('withdraw');
    Route::post('/download', [App\Http\Controllers\Admin\HomeController::class, 'download'])->name('download');
    Route::post('/users/{type}/fetch/ajax', [App\Http\Controllers\Admin\UserController::class, 'fetchUsersWithAjax'])->name('users.ajax');

    Route::get('/transactions/{type?}', [App\Http\Controllers\Admin\TransactionController::class, 'index'])->where('type', 'all|pending|deposit|withdrawal|investment|payout')->name('transactions');
    Route::put('/transactions/{transaction}/approve', [App\Http\Controllers\Admin\TransactionController::class, 'approve'])->name('transactions.approve');
    Route::put('/transactions/{transaction}/decline', [App\Http\Controllers\Admin\TransactionController::class, 'decline'])->name('transactions.decline');
    Route::post('/deposit', [App\Http\Controllers\Admin\TransactionController::class, 'deposit'])->name('deposit');
    Route::post('/withdraw', [App\Http\Controllers\Admin\TransactionController::class, 'withdraw'])->name('withdraw');
    Route::get('/transactions/export/{type}/download', [\App\Http\Controllers\Admin\ExportController::class, 'exportTransactions'])->name('transactions.export');
    Route::post('/transactions/{type}/fetch/ajax', [App\Http\Controllers\Admin\TransactionController::class, 'fetchTransactionsWithAjax'])->name('transactions.ajax');

    Route::group(['prefix' => '/investments/{type?}', 'where' => ['type' => 'plant|farm']], function() {
        Route::group(['prefix' => '/{filter?}', 'where' => ['filter' => 'all|pending|active|cancelled|settled']], function() {
            Route::post('fetch/ajax', [App\Http\Controllers\Admin\InvestmentController::class, 'fetchInvestmentsWithAjax'])->name('investments.ajax')->middleware('permission:View Investments');
            Route::get('/', [App\Http\Controllers\Admin\InvestmentController::class, 'index'])->name('investments')->middleware('permission:View Investments');
        });
        Route::get('{investment}/show', [App\Http\Controllers\Admin\InvestmentController::class, 'show'])->name('investments.show')->middleware('permission:View Investments');
    });
    Route::group(['prefix' => '/packages/{type}', 'where' => ['type' => 'plant|farm']], function() {
        Route::get('/', [\App\Http\Controllers\Admin\PackageController::class, 'index'])->name('packages');
        Route::get('/create', [App\Http\Controllers\Admin\PackageController::class, 'create'])->name('packages.create');
        Route::get('/{package}/edit', [App\Http\Controllers\Admin\PackageController::class, 'edit'])->name('packages.edit');
        Route::put('/{package}/update', [App\Http\Controllers\Admin\PackageController::class, 'update'])->name('packages.update');
        Route::delete('/{package}/destroy', [App\Http\Controllers\Admin\PackageController::class, 'destroy'])->name('packages.destroy');
        Route::get('/{package}/investments', [App\Http\Controllers\Admin\PackageController::class, 'investments'])->name('packages.investments');
    });
    Route::post('/packages/store', [App\Http\Controllers\Admin\PackageController::class, 'store'])->name('packages.store');

    Route::get('/faqs', [App\Http\Controllers\Admin\FaqController::class, 'index'])->name('faq');
    Route::get('/faqs/category', [\App\Http\Controllers\Admin\FaqCategoryController::class, 'index'])->name('faq.category');
    Route::post('/faqs/category/store', [\App\Http\Controllers\Admin\FaqCategoryController::class, 'store'])->name('faq.category.store');
    Route::delete('/faqs/category/{faqCategory}/destroy', [\App\Http\Controllers\Admin\FaqCategoryController::class, 'destroy'])->name('faq.category.destroy');
    Route::put('/faqs/category/{faqCategory?}/update', [App\Http\Controllers\Admin\FaqCategoryController::class, 'update'])->name('faq.category.update');
    Route::get('/faqs/create', [App\Http\Controllers\Admin\FaqController::class, 'create'])->name('faq.create');
    Route::get('/faqs/{faq?}/edit', [App\Http\Controllers\Admin\FaqController::class, 'edit'])->name('faq.edit');
    Route::delete('/faqs/{faq?}/destroy', [App\Http\Controllers\Admin\FaqController::class, 'destroy'])->name('faq.destroy');
    Route::post('/faqs/store', [App\Http\Controllers\Admin\FaqController::class, 'store'])->name('faq.store');
    Route::put('/faqs/{faq?}/update', [App\Http\Controllers\Admin\FaqController::class, 'update'])->name('faq.update');
    Route::get('/referrals', [App\Http\Controllers\Admin\ReferralController::class, 'index'])->name('referrals');

    Route::get('/onlinepayments', [App\Http\Controllers\Admin\OnlinePaymentController::class, 'index'])->name('onlinepayments');
    Route::post('/onlinepayments/{payment}/resolve', [App\Http\Controllers\Admin\OnlinePaymentController::class, 'resolve'])->name('onlinepayments.resolve');
    Route::post('/onlinepayments/fetch/ajax', [App\Http\Controllers\Admin\OnlinePaymentController::class, 'fetchPaymentsWithAjax'])->name('onlinepayments.ajax');
});
