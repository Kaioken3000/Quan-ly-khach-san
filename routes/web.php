<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LoaiphongController;
use App\Http\Controllers\PhongController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KhachhangController;
use App\Http\Controllers\DatphongController;
use Symfony\Component\CssSelector\Node\FunctionNode;

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

Route::get('/', function(){
    return redirect('/dashboard');
});

/**
 * Dashboard Routes
 */
Route::get('/dashboard', function () {
    return view('index');
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    
    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

        
    });
    
    Route::group(['middleware' => ['auth']], function () {
        
        
        // Loai phong Routes
        Route::resource('loaiphongs', LoaiphongController::class);
        Route::get('loaiphongs-search', '\App\Http\Controllers\LoaiphongController@search');
        Route::get('loaiphongs/loaiphongs-search', '\App\Http\Controllers\LoaiphongController@search');
        
        // Phong Routes
        Route::resource('phongs', PhongController::class);
        Route::get('phongs-search', '\App\Http\Controllers\phongController@search');
        Route::get('phongs/phongs-search', '\App\Http\Controllers\phongController@search');
        
        // Datphong Routes
        Route::resource('datphongs', DatphongController::class);
        Route::get('datphongs-kiemtra', '\App\Http\Controllers\DatphongController@kiemtra');
        Route::get('datphongs-kiemtra-capnhat', '\App\Http\Controllers\DatphongController@kiemtra_capnhat');
        Route::get('datphongs-search', '\App\Http\Controllers\DatphongController@search');
        Route::get('datphongs/datphongs-search', '\App\Http\Controllers\DatphongController@search');
        
        // Khachhang Routes
        Route::resource('khachhangs', KhachhangController::class);
        Route::get('khachhangs-search', '\App\Http\Controllers\KhachhangController@search');
        Route::get('khachhangs/khachhangs-search', '\App\Http\Controllers\KhachhangController@search');


        // Companies Routes
        Route::resource('companies', CompanyController::class);


        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});

/**
 * Client Routes
 */

Route::get('client/index', '\App\Http\Controllers\IndexController@index');

Route::get('client/rooms', '\App\Http\Controllers\IndexController@room');

Route::get('client/check', '\App\Http\Controllers\IndexController@check');

Route::get('client/reservation', '\App\Http\Controllers\IndexController@reservation');

Route::get('client/about', function () {
    return view('client.about');
});
