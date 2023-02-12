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
    });

    Route::group(['middleware' => ['auth', 'role:Admin|User']], function () {


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

        Route::get('generate-invoice-pdf', 'PDFController@generateInvoicePDF');
    });

    /**
     * Client Routes
     */
    
    
    Route::get('client/index', 'IndexController@index');
    
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
    
    // Thuc hien dang ky o nguoi dung
    Route::get('client/register', 'RegisterController@showclient')->name('client.registershow');
    Route::post('client/register', 'RegisterController@registerclient')->name('client.register');
    
    // Thuc hien dang nhap o nguoi dung
    Route::get('client/login', 'LoginController@showclient')->name('client.showclient');
    Route::post('client/login', 'LoginController@loginclient')->name('client.loginclient');

});

