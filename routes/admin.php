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
    Route::get('/roles/{role}/edit', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/store', [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('roles.store');
    Route::put('/roles/{role}/update', [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{role}/destroy', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('roles.destroy');
});
