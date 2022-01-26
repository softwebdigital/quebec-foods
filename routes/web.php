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

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('profile.update');

    Route::post('/banks', [App\Http\Controllers\BankAccountsController::class, 'store'])->name('bank.store');
    Route::put('/banks/{bank}', [App\Http\Controllers\BankAccountsController::class, 'update'])->name('bank.update');
    Route::delete('/banks/{bank}', [App\Http\Controllers\BankAccountsController::class, 'destroy'])->name('bank.destroy');
});

