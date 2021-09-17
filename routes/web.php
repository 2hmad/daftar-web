<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function() {
    Route::get('/', function () {
        return view('index');
    });
    Route::get('/login', [LoginController::class, 'login']);
    Route::get('/register', [LoginController::class, 'register']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
