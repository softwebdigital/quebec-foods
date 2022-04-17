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

Route::group(['middleware' => ['auth:admin', 'active_admin']], function (){
    Route::post('/logout', [\App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [\App\Http\Controllers\Admin\HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [App\Http\Controllers\Admin\HomeController::class, 'profile'])->name('profile');

    Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings')->middleware('permission:View Settings');
    Route::post('/setting/save', [App\Http\Controllers\Admin\SettingController::class, 'saveSettings'])->name('settings.save')->middleware('permission:Update Other Settings');

    Route::post('/profile/update', [App\Http\Controllers\Admin\HomeController::class, 'updateProfile'])->name('profile.update');
    Route::post('/password/custom/update', [App\Http\Controllers\Admin\HomeController::class, 'changePassword'])->name('password.custom.update');
    Route::post('/setting/bank/update', [App\Http\Controllers\Admin\SettingController::class, 'updateBankDetails'])->name('bank.update')->middleware('permission:Update Company Bank Details');

    Route::get('/admins', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admins')->middleware('permission:View Admins');
    Route::get('/admins/create', [App\Http\Controllers\Admin\AdminController::class, 'create'])->name('admins.create')->middleware('permission:Create Admins');
    Route::post('/admins/store', [App\Http\Controllers\Admin\AdminController::class, 'store'])->name('admins.store')->middleware('permission:Create Admins');
    Route::put('/admins/{admin}/block', [App\Http\Controllers\Admin\AdminController::class, 'block'])->name('admins.block')->middleware('permission:Block Admins');
    Route::put('/admins/{admin}/unblock', [App\Http\Controllers\Admin\AdminController::class, 'unblock'])->name('admins.unblock')->middleware('permission:Unblock Admins');
    Route::post('/admins/role/change', [App\Http\Controllers\Admin\AdminController::class, 'changeRole'])->name('admins.role.change')->middleware('permission:Change Admins Role');

    Route::get('/roles', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('roles')->middleware('permission:View Roles');
    Route::get('/roles/create', [App\Http\Controllers\Admin\RoleController::class, 'create'])->name('roles.create')->middleware('permission:Create Roles');
    Route::get('/roles/{role?}/edit', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('roles.edit')->middleware('permission:Edit Roles');
    Route::get('/roles/{role?}/show', [App\Http\Controllers\Admin\RoleController::class, 'show'])->name('roles.show')->middleware('permission:View Roles');
    Route::post('/roles/store', [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('roles.store')->middleware('permission:Create Roles');
    Route::put('/roles/{role?}/update', [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('roles.update')->middleware('permission:Edit Roles');
    Route::delete('/roles/{role?}/destroy', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('roles.destroy')->middleware('permission:Delete Roles');

    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users')->middleware('permission:View Users');
    Route::get('/users/{user}/show', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('users.show')->middleware('permission:View Users');
    Route::get('/users/{user}/{type}/investments', [App\Http\Controllers\Admin\UserController::class, 'showUserInvestments'])->where('type', 'farm|plant')->name('users.investments');
    Route::get('/users/{user}/transactions', [App\Http\Controllers\Admin\UserController::class, 'showTransactions'])->name('users.transactions')->middleware('permission:View Transactions');
    Route::get('/users/{user}/wallet', [App\Http\Controllers\Admin\UserController::class, 'showWallet'])->name('users.wallet')->middleware('permission:View Users Wallet');
    Route::get('/users/{user}/referrals', [App\Http\Controllers\Admin\UserController::class, 'showReferrals'])->name('users.referrals')->middleware('permission:View Referrals');
    Route::get('/users/{user}/invest', [App\Http\Controllers\Admin\InvestmentController::class, 'invest'])->name('users.invest');
    Route::get('/users/{user}/{type}/investments/{investment}/show', [App\Http\Controllers\Admin\InvestmentController::class, 'showUserInvestment'])->where('type', 'farm|plant')->name('users.investment.show')->middleware('permission:View Investments');
    Route::put('/users/{user}/block', [App\Http\Controllers\Admin\UserController::class, 'block'])->name('users.block')->middleware('permission:Block Users');
    Route::put('/users/{user}/unblock', [App\Http\Controllers\Admin\UserController::class, 'unblock'])->name('users.unblock')->middleware('permission:Unblock Users');
    Route::post('/users/invest/store', [App\Http\Controllers\Admin\InvestmentController::class, 'store'])->name('users.invest.store')->middleware('permission:Make Investments For Users');
    Route::post('/deposit', [App\Http\Controllers\Admin\TransactionController::class, 'deposit'])->name('deposit')->middleware('permission:Deposit For Users');
    Route::post('/withdraw', [App\Http\Controllers\Admin\TransactionController::class, 'withdraw'])->name('withdraw')->middleware('permission:Withdraw For Users');
    Route::post('/users/{type}/{status}fetch/ajax', [App\Http\Controllers\Admin\UserController::class, 'fetchUsersWithAjax'])->name('users.ajax')->middleware('permission:View Users');

    Route::get('/transactions/{type?}', [App\Http\Controllers\Admin\TransactionController::class, 'index'])->where('type', 'all|pending|deposit|withdrawal|investment|payout')->name('transactions')->middleware('permission:View Transactions');
    Route::put('/transactions/{transaction}/approve', [App\Http\Controllers\Admin\TransactionController::class, 'approve'])->name('transactions.approve')->middleware('permission:Approve Transactions');
    Route::put('/transactions/{transaction}/decline', [App\Http\Controllers\Admin\TransactionController::class, 'decline'])->name('transactions.decline')->middleware('permission:Decline Transactions');
    Route::post('/deposit', [App\Http\Controllers\Admin\TransactionController::class, 'deposit'])->name('deposit')->middleware('permission:Deposit For Users');
    Route::post('/withdraw', [App\Http\Controllers\Admin\TransactionController::class, 'withdraw'])->name('withdraw')->middleware('permission:Withdraw For Users');
    Route::get('/transactions/export/{type}/download', [\App\Http\Controllers\Admin\ExportController::class, 'exportTransactions'])->name('transactions.export')->middleware('permission:Export Transactions CSV');
    Route::post('/transactions/{type}/{status}/fetch/ajax', [App\Http\Controllers\Admin\TransactionController::class, 'fetchTransactionsWithAjax'])->name('transactions.ajax')->middleware('permission:View Transactions');

    Route::get('/investments', [App\Http\Controllers\Admin\InvestmentController::class, 'index'])->name('investments')->middleware('permission:View Investments');
    Route::group(['prefix' => '/investments/{type?}', 'where' => ['type' => 'all|plant|farm']], function() {
        Route::group(['prefix' => '/{filter?}', 'where' => ['filter' => 'all|pending|active|cancelled|settled']], function() {
            Route::post('fetch/ajax', [App\Http\Controllers\Admin\InvestmentController::class, 'fetchInvestmentsWithAjax'])->name('investments.ajax')->middleware('permission:View Investments');
        });
        Route::get('{investment}/show', [App\Http\Controllers\Admin\InvestmentController::class, 'show'])->name('investments.show')->middleware('permission:View Investments');
    });
    Route::get('/packages', [\App\Http\Controllers\Admin\PackageController::class, 'index'])->name('packages')->middleware('permission:View Packages');
    Route::group(['prefix' => '/packages/{type}', 'where' => ['type' => 'plant|farm']], function() {
        Route::get('/{package}/investments', [App\Http\Controllers\Admin\PackageController::class, 'investments'])->name('packages.investments')->middleware('permission:View Investments');
        Route::get('/create', [App\Http\Controllers\Admin\PackageController::class, 'create'])->name('packages.create')->middleware('permission:Create Packages');
        Route::get('/{package}/edit', [App\Http\Controllers\Admin\PackageController::class, 'edit'])->name('packages.edit')->middleware('permission:Edit Packages');
        Route::get('/{package}/show', [App\Http\Controllers\Admin\PackageController::class, 'show'])->name('packages.show');
        Route::put('/{package}/update', [App\Http\Controllers\Admin\PackageController::class, 'update'])->name('packages.update')->middleware('permission:Edit Packages');
        Route::delete('/{package}/destroy', [App\Http\Controllers\Admin\PackageController::class, 'destroy'])->name('packages.destroy')->middleware('permission:Delete Packages');
    });
    Route::post('/packages/store', [App\Http\Controllers\Admin\PackageController::class, 'store'])->name('packages.store')->middleware('permission:Create Packages');

    Route::get('/faqs', [App\Http\Controllers\Admin\FaqController::class, 'index'])->name('faq')->middleware('permission:View FAQs');
    Route::get('/faqs/category', [\App\Http\Controllers\Admin\FaqCategoryController::class, 'index'])->name('faq.category')->middleware('permission:View FAQs Category');
    Route::post('/faqs/category/store', [\App\Http\Controllers\Admin\FaqCategoryController::class, 'store'])->name('faq.category.store')->middleware('permission:Create FAQs Category');
    Route::delete('/faqs/category/{faqCategory}/destroy', [\App\Http\Controllers\Admin\FaqCategoryController::class, 'destroy'])->name('faq.category.destroy')->middleware('permission:Delete FAQs Category');
    Route::put('/faqs/category/{faqCategory?}/update', [App\Http\Controllers\Admin\FaqCategoryController::class, 'update'])->name('faq.category.update')->middleware('permission:Edit FAQs Category');
    Route::get('/faqs/create', [App\Http\Controllers\Admin\FaqController::class, 'create'])->name('faq.create')->middleware('permission:Create FAQs');
    Route::get('/faqs/{faq?}/edit', [App\Http\Controllers\Admin\FaqController::class, 'edit'])->name('faq.edit')->middleware('permission:Edit FAQs');
    Route::delete('/faqs/{faq?}/destroy', [App\Http\Controllers\Admin\FaqController::class, 'destroy'])->name('faq.destroy')->middleware('permission:Delete FAQs');
    Route::post('/faqs/store', [App\Http\Controllers\Admin\FaqController::class, 'store'])->name('faq.store')->middleware('permission:Create FAQs');
    Route::put('/faqs/{faq?}/update', [App\Http\Controllers\Admin\FaqController::class, 'update'])->name('faq.update')->middleware('permission:Edit FAQs');
    Route::get('/referrals', [App\Http\Controllers\Admin\ReferralController::class, 'index'])->name('referrals')->middleware('permission:View Referrals');

    Route::get('/onlinepayments', [App\Http\Controllers\Admin\OnlinePaymentController::class, 'index'])->name('onlinepayments')->middleware('permission:View Payments');
    Route::post('/onlinepayments/{payment}/resolve', [App\Http\Controllers\Admin\OnlinePaymentController::class, 'resolve'])->name('onlinepayments.resolve')->middleware('permission:Resolve Payments');
    Route::post('/onlinepayments/fetch/ajax', [App\Http\Controllers\Admin\OnlinePaymentController::class, 'fetchPaymentsWithAjax'])->name('onlinepayments.ajax')->middleware('permission:View Payments');

    Route::get('/verifications', [App\Http\Controllers\Admin\VerificationController::class, 'index'])->name('verifications');
    Route::put('/verifications/{verification}/{status}', [App\Http\Controllers\Admin\VerificationController::class, 'process'])->name('verification.process');

    Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category');
    Route::post('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');
    Route::put('/category/{category}/update', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{category}/destroy', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('category.destroy');

    Route::get('/maintenance', [App\Http\Controllers\Admin\MaintenanceController::class, 'index'])->name('maintenance.index');
    Route::put('/maintenance/{maintenance}/change/{state}', [App\Http\Controllers\Admin\MaintenanceController::class, 'change'])->name('maintenance.change');

    Route::post('/users/export', [App\Http\Controllers\Admin\ExportController::class, 'exportUsers'])->name('users.export')->middleware('permission:Export Users CSV');
    Route::post('/investments/export', [App\Http\Controllers\Admin\ExportController::class, 'exportInvestments'])->name('investments.export');
    Route::post('/transactions/export', [App\Http\Controllers\Admin\ExportController::class, 'exportTransactions'])->name('transactions.export');
    Route::post('/referrals/export', [App\Http\Controllers\Admin\ExportController::class, 'exportReferrals'])->name('referrals.export');
    Route::post('/onlinepayments/export', [App\Http\Controllers\Admin\ExportController::class, 'exportOnlinePayments'])->name('onlinePayments.export');
});
