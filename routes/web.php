<?php

use App\Http\Controllers\AddSupplierDataController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginUsers;
use App\Http\Controllers\RegisterUsers;
use App\Http\Controllers\SuppliersController;
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

    Route::group(['middleware' => 'loggedIn'], function () {
        Route::get('/login', [LoginUsers::class, 'index']);
        Route::post('/login', [LoginUsers::class, 'login'])->name('login');
        Route::get('/register', [RegisterUsers::class, 'index']);
        Route::post('/register', [RegisterUsers::class, 'store'])->name('register');
    });

    Route::group(['middleware' => 'checkAuth'], function () {

        Route::group(['name', 'customers'], function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::post('/dashboard', [CustomersController::class, 'store'])->name('store-customer');
            Route::get('/customer/{id}', [CustomersController::class, 'fetch']);
        });

        Route::group(['name', 'suppliers'], function () {
            Route::get('/suppliers', [SuppliersController::class, 'index'])->name('suppliers');
            Route::post('/suppliers', [SuppliersController::class, 'store'])->name('store-supplier');
            Route::get('/supplier/{id}', [SuppliersController::class, 'fetch']);
            Route::post('/supplier', [AddSupplierDataController::class, 'store_sup_data'])->name('store-supplier-data');
        });

        Route::get('/settings', function () {
            return view('settings');
        });

    });
});
