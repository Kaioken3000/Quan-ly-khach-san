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
use App\Http\Controllers\DanhsachdatphongController;
use App\Http\Controllers\DichvuController;
use App\Http\Controllers\DichvuDatphongController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\BotManChatController;
use App\Http\Controllers\ThanhtoanController;
use Symfony\Component\CssSelector\Node\FunctionNode;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
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

/**
 * Dashboard Routes
 */
Route::get('/dashboard', '\App\Http\Controllers\IndexController@dashboard');

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    /**
     * Logout Routes
     */
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    Route::get('/client/logout', 'LogoutController@clientperform')->name('client.logout');
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

        /**
         * Google Login Routes
         */
        Route::controller(GoogleController::class)->group(function () {
            Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
            Route::get('auth/google/callback', 'handleGoogleCallback');
        });

        /**
         * Facebook Login Routes
         */
        Route::controller(FacebookController::class)->group(function () {
            Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
            Route::get('auth/facebook/callback', 'handleFacebookCallback');
        });
    });

    Route::group(['middleware' => ['auth', 'role:Admin|User']], function () {
        // thanh toan vnpay
        Route::get("/thanhtoanvnpayview/{datphongid}/{loaitien}/{khachhangid}", "ThanhtoanController@index");
        Route::post("/thanhtoanvnpay", "ThanhtoanController@create")->name("thanhtoanvnpay");
        Route::get("/vnpay_return", "ThanhtoanController@return");

        // chat function
        Route::get('/chatview/{useridreceiver}', function () {
            return view('chat');
        })->name('chat.view');
        Route::get('/getUserLogin', function () {
            return Auth::user();
        });
        Route::get('/messages', 'MessageController@index');
        Route::post('/messages', 'MessageController@store');

        // Loai phong Routes
        Route::resource('loaiphongs', LoaiphongController::class);
        Route::get('loaiphongs-search', 'LoaiphongController@search');
        Route::get('loaiphongs/loaiphongs-search', 'LoaiphongController@search');

        // Phong Routes
        Route::resource('phongs', PhongController::class);
        Route::get('phongs-search', 'phongController@search');
        Route::get('phongs/phongs-search', 'phongController@search');

        // Dichvu Routes
        Route::resource('dichvus', DichvuController::class);
        Route::get('dichvus-search', 'dichvuController@search');
        Route::get('dichvus/dichvus-search', 'dichvuController@search');

        // Dichvu Routes
        Route::resource('dichvu_datphong', DichvuDatphongController::class);

        // Datphong Routes
        Route::resource('datphongs', DatphongController::class);
        Route::get('datphongs-kiemtra', 'DatphongController@kiemtra'); //kiem tra dat phong
        Route::get('datphongs-kiemtra-capnhat', 'DatphongController@kiemtra_capnhat'); //kiem tra dat phong khi thay doi
        Route::get('datphongs-search', 'DatphongController@search'); //tim kiem
        Route::get('datphongs/datphongs-search', 'DatphongController@search'); //tim kiem
        Route::put('/datphongs-thanhtoan', 'DatphongController@thanhtoan')->name('datphongs.thanhtoan'); //thanh toán
        Route::put('/datphongs-chinhthanhtoan', 'DatphongController@chinhthanhtoan')->name('datphongs.chinhthanhtoan'); //thanh toán khi thay doi
        Route::put('/datphongs-nhanphong', 'DatphongController@nhanphong')->name('datphongs.nhanphong'); //nhan phong

        //Huỷ đặt phòng
        Route::delete('/huydatphongs/{datphong}', 'HuydatphongController@store')->name('huydatphongs.store'); //huỷ đặt phong

        //Danh sach dat phong
        Route::post('/danhsahcdatphongs-change', 'DanhsachdatphongController@change')->name('danhsachdatphongs.change'); //nhan phong
        Route::get('/danhsahcdatphongs-index', 'DanhsachdatphongController@index')->name('danhsachdatphongs.index'); //nhan phong index

        // Khachhang Routes
        Route::resource('khachhangs', KhachhangController::class);
        Route::get('khachhangs-search', 'KhachhangController@search');
        Route::get('khachhangs/khachhangs-search', 'KhachhangController@search');

        Route::group(['middleware' => ['role:Admin']], function () {
            //Role
            Route::resource('roles', RoleController::class);

            //Nhân viên
            Route::resource('nhanviens', NhanvienController::class);
            Route::get('nhanviens-search', 'NhanvienController@search');
            Route::get('nhanviens/nhanviens-search', 'NhanvienController@search');

            //User
            Route::resource('users', UserController::class);
            Route::get('users-search', 'UserController@search');
            Route::get('users/nhanviens-search', 'UserController@search');
        });

        //Profile
        Route::get('/profile', 'IndexController@profile');
        Route::get('/profiles/vieweditprofile', 'IndexController@vieweditprofile');
        Route::match(['put', 'patch'], '/profiles/{user}/editprofile', 'IndexController@editprofile')->name('profile.editprofile');

        // Báo cáo
        Route::get('/baocaos-index', 'BaocaoController@index')->name('baocaos.index'); //báo cáo index

    });
    Route::group(['middleware' => ['auth', 'role:Admin|User']], function () {
        // thanh toan vnpay
        Route::get("/client/thanhtoanvnpayview/{datphongid}/{loaitien}/{khachhangid}/{sotien}", "ThanhtoanClientController@index");
        Route::post("/client/thanhtoanvnpay", "ThanhtoanClientController@create")->name("client.thanhtoanvnpay");
        Route::get("/client/vnpay_return", "ThanhtoanClientController@return");
    });

    Route::get('generate-invoice-pdf', 'PDFController@generateInvoicePDF');

    /**
     * Client Routes
     */


    Route::get('client/index', 'IndexController@index');

    // Giao dien trang phong
    Route::get('client/phong', 'IndexController@hientrangphong');
    // Hien chi tiet phong
    Route::get('client/chitietphong/{phongid}', 'IndexController@hientrangchitietphong');

    // Hien lai thong tin khách hang
    Route::get('client/khachhang', 'IndexController@hienkhachhang');
    // Xoa thong tin khách hang
    Route::delete('client/khachhang/{user}', 'IndexController@xoakhachhang')->name('client.xoakhachhang');
    // Sua thong tin khách hang
    Route::put('client/khachhang/{user}', 'IndexController@khachhangedit')->name('client.khachhangedit');

    // Kiem tra phong trong tao moi
    Route::get('client/check', 'IndexController@checkroom');

    // Nhap thong tin khách hang de dat phong
    Route::get('client/reservation', 'IndexController@reservation');

    // Danh sách các phòng đã đặt
    Route::post('client/danhsachdatphong', 'IndexController@danhsachdatphong');

    // hien đổi phòng đã đặt
    Route::get('client/hiendoiphongclient', 'IndexController@hiendoiphongclient');

    // doi phong
    Route::post('client/doiphongclient', 'IndexController@doiphongclient');

    // xoa dat phong
    Route::delete('client/xoadatphong/{datphong}', 'IndexController@xoadatphong')->name('client.xoadatphong');

    // dat phong
    Route::post('/index-store', 'IndexController@index_store');
    // Kiem tra dat phong trong chi tiet phong
    Route::post('/kiemtra-index-store', 'IndexController@kiemtra_index_store');


    // Thuc hien dang ky o nguoi dung
    Route::get('client/register', 'RegisterController@showclient')->name('client.registershow');
    Route::post('client/register', 'RegisterController@registerclient')->name('client.register');

    // Thuc hien dang nhap o nguoi dung
    Route::get('client/login', 'LoginController@showclient')->name('client.showclient');
    Route::post('client/login', 'LoginController@loginclient')->name('client.loginclient');

    // dich vu dat phong
    Route::post('/client/dichvu_satphong_store', 'IndexController@dichvu_satphong_store')->name('client.dichvu_satphong_store');

    // Botman
    Route::match(['get', 'post'], '/botman', [BotManChatController::class, 'handle']);
});
