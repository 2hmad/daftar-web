<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginUsers;
use App\Http\Controllers\RegisterUsers;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::get('/', function () {
        return view('index');
    });
    Route::get('/login', [LoginUsers::class, 'index']);
    Route::post('/login', [LoginUsers::class, 'login'])->name('login');

    Route::get('/register', [RegisterUsers::class, 'index']);
    Route::post('/register', [RegisterUsers::class, 'store'])->name('register');

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/suppliers', [DashboardController::class, 'suppliers']);
    Route::get('/settings', function () {
        return view('settings');
    });
});
