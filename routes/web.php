<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LoaiphongController;
use App\Http\Controllers\PhongController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KhachhangController;
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
        
        /**
         * Dashboard Routes
         */
        Route::get('/dashboard', function () {
            return view('index');
        });
        
        // Loai phong Routes
        Route::resource('loaiphongs', LoaiphongController::class);
        Route::post('loaiphongs-search', '\App\Http\Controllers\LoaiphongController@search');
        Route::post('loaiphongs/loaiphongs-search', '\App\Http\Controllers\LoaiphongController@search');
        
        // Phong Routes
        Route::resource('phongs', PhongController::class);
        Route::post('phongs-search', '\App\Http\Controllers\phongController@search');
        Route::post('phongs/phongs-search', '\App\Http\Controllers\phongController@search');


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

Route::get('/', function(){
    return redirect('client/index');
});


Route::get('client/rooms', '\App\Http\Controllers\IndexController@room');

Route::get('client/check', '\App\Http\Controllers\IndexController@check');

Route::get('client/reservation', '\App\Http\Controllers\IndexController@reservation');

Route::get('client/about', function () {
    return view('client.about');
});

// Phong Routes
Route::resource('khachhangs', KhachhangController::class);
