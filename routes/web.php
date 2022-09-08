<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LoaiphongController;
use App\Http\Controllers\PhongController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KhachhangController;
use App\Http\Controllers\DatphongController;
use App\Http\Controllers\NhanvienController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PDFController;
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
        Route::get('loaiphongs-search', 'LoaiphongController@search');
        Route::get('loaiphongs/loaiphongs-search', 'LoaiphongController@search');
        
        // Phong Routes
        Route::resource('phongs', PhongController::class);
        Route::get('phongs-search', 'phongController@search');
        Route::get('phongs/phongs-search', 'phongController@search');
        
        // Datphong Routes
        Route::resource('datphongs', DatphongController::class);
        Route::get('datphongs-kiemtra', 'DatphongController@kiemtra');
        Route::get('datphongs-kiemtra-capnhat', 'DatphongController@kiemtra_capnhat');
        Route::get('datphongs-search', 'DatphongController@search');
        Route::get('datphongs/datphongs-search', 'DatphongController@search');
        Route::put('/datphongs-thanhtoan', 'DatphongController@thanhtoan')->name('datphongs.thanhtoan');
        Route::put('/datphongs-chinhthanhtoan', 'DatphongController@chinhthanhtoan')->name('datphongs.chinhthanhtoan');
        
        // Khachhang Routes
        Route::resource('khachhangs', KhachhangController::class);
        Route::get('khachhangs-search', 'KhachhangController@search');
        Route::get('khachhangs/khachhangs-search', 'KhachhangController@search');
        
        Route::group(['middleware' => ['role:Admin']], function () {
            Route::resource('roles', RoleController::class);
            Route::resource('nhanviens', NhanvienController::class);
            Route::resource('users', UserController::class);
        });

        // Companies Routes
        Route::resource('companies', CompanyController::class);

        Route::get('generate-invoice-pdf', 'PDFController@generateInvoicePDF');

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

Route::post('/index-store', '\App\Http\Controllers\IndexController@index_store');

Route::get('/client/about', function () {
    return view('client.about');
});
