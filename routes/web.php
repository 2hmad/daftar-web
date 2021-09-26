<?php

use App\Http\Controllers\AddCustomerDataController;
use App\Http\Controllers\AddSupplierDataController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginUsers;
use App\Http\Controllers\MyInfoController;
use App\Http\Controllers\RegisterUsers;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\AddUsersController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
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
            Route::post('/customer', [AddCustomerDataController::class, 'store_cus_data'])->name('store-customer-data');
        });

        Route::group(['name', 'suppliers'], function () {
            Route::get('/suppliers', [SuppliersController::class, 'index'])->name('suppliers');
            Route::post('/suppliers', [SuppliersController::class, 'store'])->name('store-supplier');
            Route::get('/supplier/{id}', [SuppliersController::class, 'fetch']);
            Route::post('/supplier', [AddSupplierDataController::class, 'store_sup_data'])->name('store-supplier-data');
        });

        Route::group(['name', 'settings'], function () {
            Route::get('/my-info', [MyInfoController::class, 'index']);
            Route::post('/my-info', [MyInfoController::class, 'update'])->name('update.my-info');
            Route::get('/add-users', [AddUsersController::class, 'index']);
            Route::post('/add-users', [AddUsersController::class, 'store'])->name('add-users');
        });

        Route::get('/logout', function () {
            Auth::logout();
            Session::flush();
            Cookie::queue(Cookie::forget('laravel_session'));
            return Redirect::to('/login');
        })->name('logout');

        Route::get('/settings', function () {
            return view('settings');
        });
    });
});
