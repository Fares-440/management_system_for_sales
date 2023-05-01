<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::get('/fares', function () {
    return view('admin.dashboard');
    return view('welcome');
});

// Route::get('logout', function () {
//     auth()->guard('admin')->logout();
//     return redirect()->route('admin.login');
// });

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::controller(App\Http\Controllers\Admin\DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('admin.dashboard');
    });
    Route::get('logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');
});


Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::controller(App\Http\Controllers\Admin\LoginController::class)->group(function () {
        Route::get('login', 'showLoginPage')->name('admin.loginPage');
        Route::post('login', 'login')->name('admin.login');
    });
});
