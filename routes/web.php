<?php

use App\Models\User;
use App\Models\Thietbi;
use App\Models\Chinhanh;
use App\Mail\MyTestEmail;
use App\Models\Virtualtour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\HinhController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\XulyController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PhongController;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\AnuongController;
use App\Http\Controllers\CatrucController;
use App\Http\Controllers\DichvuController;

use App\Http\Controllers\GiuongController;
use App\Http\Controllers\MieutaController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\CompanyController;

use App\Http\Controllers\MeetingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ThietbiController;
use App\Http\Controllers\ChinhanhController;
use App\Http\Controllers\DatphongController;
use App\Http\Controllers\NhanvienController;
use App\Http\Controllers\HinhPhongController;
use App\Http\Controllers\KhachhangController;
use App\Http\Controllers\LoaiphongController;
use App\Http\Controllers\NhanphongController;
use App\Http\Controllers\ThanhtoanController;
use App\Http\Controllers\BotManChatController;
use App\Http\Controllers\GiuongPhongController;
use App\Http\Controllers\MieutaPhongController;
use App\Http\Controllers\VirtualtourController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\HinhChinhanhController;
use App\Http\Controllers\ThietbiPhongController;
use App\Http\Controllers\AnuongDatphongController;
use App\Http\Controllers\DichvuDatphongController;
use App\Http\Controllers\MieutaChinhanhController;
use App\Http\Controllers\DanhsachdatphongController;
use App\Http\Controllers\VirtualtourPhongController;
use App\Http\Controllers\CommentController;
use App\Models\Comment;
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
Route::get('/home', function () {
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

    Route::group(['middleware' => ['auth', 'role:MainAdmin']], function () {
        //Role
        Route::resource('roles', RoleController::class);
        // Chi nhanh Routes
        Route::resource('chinhanhs', ChinhanhController::class);
        Route::get('chinhanhs-search', 'ChinhanhController@search');
        Route::get('chinhanhs/chinhanhs-search', 'ChinhanhController@search');
        Route::get('chinhanhs/chitiet/{chinhanhid}', 'ChinhanhController@showChinhanhChitiet');

        // HinhChinhanh Route
        Route::resource('hinh_chinhanh', HinhChinhanhController::class);

        // MieutaChinhanh Route
        Route::resource('mieuta_chinhanh', MieutaChinhanhController::class);
    });

    Route::group(['middleware' => ['auth', 'role:MainAdmin|Admin|User']], function () {
        // thanh toan vnpay
        Route::get("/thanhtoanvnpayview", "ThanhtoanController@index");
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
        Route::get('phongs/roomDetail/{phongid}', 'phongController@roomDetail')->name("phong.roomDetail");

        // Dichvu Routes
        Route::resource('dichvus', DichvuController::class);
        Route::get('dichvus-search', 'DichvuController@search');
        Route::get('dichvus/dichvus-search', 'DichvuController@search');
        // Dichvu Routes
        Route::resource('dichvu_datphong', DichvuDatphongController::class);

        // Anuong Routes
        Route::resource('anuongs', AnuongController::class);
        Route::get('anuongs-search', 'AnuongController@search');
        Route::get('anuongs/anuongs-search', 'AnuongController@search');

        // Thiet bi Routes
        Route::resource('thietbis', ThietbiController::class);
        Route::get('thietbis-search', 'ThietbiController@search');
        Route::get('thietbis/thietbis-search', 'ThietbiController@search');
        // ThietbiPhong Route
        Route::resource('thietbi_phong', ThietbiPhongController::class);

        // Mieu ta Routes
        Route::resource('mieutas', MieutaController::class);
        Route::get('mieutas-search', 'MieutaController@search');
        Route::get('mieutas/mieutas-search', 'MieutaController@search');
        // MieutaPhong Route
        Route::resource('mieuta_phong', MieutaPhongController::class);


        // Hinh Routes
        Route::resource('hinhs', HinhController::class);
        Route::get('hinhs-search', 'HinhController@search');
        Route::get('hinhs/hinhs-search', 'HinhController@search');
        // HinhPhong Route
        Route::resource('hinh_phong', HinhPhongController::class);


        // Virtualtour Routes
        Route::resource('virtualtours', VirtualtourController::class);
        Route::get('virtualtours-search', 'VirtualtourController@search');
        Route::get('virtualtours/virtualtours-search', 'VirtualtourController@search');
        Route::get('virtualtours-showpreview/{virtualtourid}', 'VirtualtourController@showPreview');
        // HinhPhong Route
        Route::resource('virtualtour_phong', VirtualtourPhongController::class);

        // Giuong Routes
        Route::resource('giuongs', GiuongController::class);
        Route::get('giuongs-search', 'GiuongController@search');
        Route::get('giuongs/giuongs-search', 'GiuongController@search');
        // GiuongPhong Route
        Route::resource('giuong_phong', GiuongPhongController::class);

        // Datphong Routess
        Route::resource('datphongs', DatphongController::class);
        Route::get('datphongs-kiemtra', 'DatphongController@kiemtra'); //kiem tra dat phong
        Route::get('datphongs-kiemtra-capnhat', 'DatphongController@kiemtra_capnhat'); //kiem tra dat phong khi thay doi
        Route::get('datphongs-search', 'DatphongController@search'); //tim kiem
        Route::get('datphongs/datphongs-search', 'DatphongController@search'); //tim kiem
        Route::put('/datphongs-thanhtoan', 'DatphongController@thanhtoan')->name('datphongs.thanhtoan'); //thanh toán
        Route::put('/datphongs-chinhthanhtoan', 'DatphongController@chinhthanhtoan')->name('datphongs.chinhthanhtoan'); //thanh toán khi thay doi

        Route::put('/datphongs-nhanphong', 'NhanphongController@store')->name('datphongs.nhanphong'); //nhan phong
        Route::put('/datphongs-xuly', 'XulyController@store')->name('datphongs.xuly'); //xu ly

        Route::get('/showHuydatphong', 'DatphongController@showHuydatphong')->name('datphongs.showHuydatphong'); //show huy dat phong
        Route::get('/showHistoryPage', 'DatphongController@showHistoryPage')->name('datphongs.showHistoryPage'); //show historry page

        //Huỷ đặt phòng
        Route::delete('/huydatphongs/{datphong}', 'HuydatphongController@store')->name('huydatphongs.store'); //huỷ đặt phong

        //Danh sach dat phong
        Route::post('/danhsahcdatphongs-change', 'DanhsachdatphongController@change')->name('danhsachdatphongs.change'); //nhan phong
        Route::get('/danhsahcdatphongs-index', 'DanhsachdatphongController@index')->name('danhsachdatphongs.index'); //nhan phong index

        // Khachhang Routes
        Route::resource('khachhangs', KhachhangController::class);
        Route::get('khachhangs-search', 'KhachhangController@search');
        Route::get('khachhangs/khachhangs-search', 'KhachhangController@search');
        Route::get('khachhangs/datphongs/{khachhangid}', 'KhachhangController@showDatphongCuaKhachhang');
        Route::get('khachhangs/chitiet/{khachhangid}/{view}', 'KhachhangController@showChitietKhachhang');

        Route::group(['middleware' => ['role:MainAdmin|Admin']], function () {
            //Nhân viên
            Route::resource('nhanviens', NhanvienController::class);
            Route::get('nhanviens-search', 'NhanvienController@search');
            Route::get('/nhanviens-taotaikhoan/{nhanvienid}', 'NhanvienController@viewtaotaikhoan');
            Route::post('nhanviens-taotaikhoan', 'NhanvienController@taotaikhoan');
            Route::get('nhanviens/nhanviens-search', 'NhanvienController@search');
            Route::put('updateUserid', 'NhanvienController@updateUserid');

            //User
            Route::resource('users', UserController::class);
            Route::get('users-search', 'UserController@search');
            Route::get('users/nhanviens-search', 'UserController@search');

            // Ca trực
            Route::resource('catrucs', CatrucController::class);
            Route::get('catrucs-search', 'CatrucController@search');
            Route::get('catrucs/nhanviens-search', 'CatrucController@search');

            // Catruc nhanvien Routes
            Route::resource('catruc_nhanviens', CatrucNhanvienController::class);
            Route::get('catruc_nhanvien/themCatruc/{nhanvienid}', 'CatrucNhanvienController@viewThemcatruc');
        });

        //Profile
        Route::get('/profile', 'IndexController@profile');
        Route::get('/profiles/vieweditprofile', 'IndexController@vieweditprofile');
        Route::match(['put', 'patch'], '/profiles/{user}/editprofile', 'IndexController@editprofile')->name('profile.editprofile');

        // Báo cáo
        Route::get('/baocaos-index', 'BaocaoController@index')->name('baocaos.index'); //báo cáo index

        // calendar
        Route::get('fullcalender', [FullCalenderController::class, 'index']);
        Route::get('userfullcalender', [FullCalenderController::class, 'userindex']);
        Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);

        // check in, check out
        Route::post('checkin', 'CheckController@checkin');
        Route::put('checkout', 'CheckController@checkout');

        // Video chat route
        Route::get('/videochat', function () {
            return view('welcome');
        });

        Route::post("/createMeeting", [MeetingController::class, 'createMeeting'])->name("createMeeting");

        Route::post("/validateMeeting", [MeetingController::class, 'validateMeeting'])->name("validateMeeting");

        Route::get("/meeting/{meetingId}", function ($meetingId) {

            $METERED_DOMAIN = env('METERED_DOMAIN');
            return view('meeting', [
                'METERED_DOMAIN' => $METERED_DOMAIN,
                'MEETING_ID' => $meetingId
            ]);
        });
        // video chat route end
    });
    Route::group(['middleware' => ['auth', 'role:Khachhang']], function () {
        // thanh toan vnpay
        Route::get("/client/thanhtoanvnpayview/{datphongid}/{loaitien}/{khachhangid}/{sotien}", "ThanhtoanClientController@index");
        Route::post("/client/thanhtoanvnpay", "ThanhtoanClientController@create")->name("client.thanhtoanvnpay");
        Route::get("/client/vnpay_return", "ThanhtoanClientController@return");

        // Nhap thong tin khách hang de dat phong
        Route::get('client/reservation', 'IndexController@reservation');
        Route::post('client/reservation', 'IndexController@reservation');

        // Danh sách các phòng đã đặt
        Route::post('client/danhsachdatphong', 'IndexController@danhsachdatphong');
        Route::get('client/danhsachdatphong', 'IndexController@danhsachdatphong')->name("client.danhsachdatphong");
        Route::get('client/datphongChitiet/{datphongid}', 'IndexController@datphongChitiet');

        Route::get('client/game', 'IndexController@game');
        Route::get('client/game1', 'IndexController@game1');
        Route::get('client/game2', 'IndexController@game2');
        Route::get('client/game3', 'IndexController@game3');
        Route::get('client/game4', 'IndexController@game4');

    });

    // comment
    Route::resource('comments', CommentController::class);

    // AnuongDatphong
    Route::resource('anuong_datphong', AnuongDatphongController::class);

    // Hoadon
    Route::get('generate-invoice-pdf', 'PDFController@generateInvoicePDF');

    /**
     * Client Routes
     */


    Route::get('client/index', 'IndexController@index');

    // Giao dien trang phong
    Route::get('client/phong', 'IndexController@hientrangphong');
    // Chi nhánh
    Route::get('client/chinhanh', 'IndexController@showChinhanhs');
    Route::get('client/chinhanhChitiet/{chinhanhid}', 'IndexController@showChinhanhChitiet');

    // Search phong
    Route::get('client/search-phong', 'IndexController@searchPhong');
    Route::post('client/search-phong-with-many', 'IndexController@searchPhongWithManySearch');
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

    // Virtual tour
    Route::get('client/virtualTour', function () {
        return view("client.virtualTour");
    });
    // Virtual tour
    Route::get('client/previewVirtualTour/{virtualtourid}', 'IndexController@previewVirtualTour');

    Route::get('/testroute', function () {
        $name = "Funny Coder";

        // The email sending is done using the to method on the Mail facade
        // Mail::to('namb1910261@student.ctu.edu.vn')->send(new MyTestEmail($name));
    });

    // Mobile route
    // Route::get('showtoken',   function () {
    //     echo csrf_token();
    // });
    // load danh sach phong
    Route::get('mobile/client/index', 'MobileController@indexMobile');

    // load 1 phong voi phong id
    Route::get('mobile/client/soPhong/{soPhong}', 'MobileController@indexMobileWithSoPhong');

    // kiem tra phong trong
    Route::get('mobile/client/kiemtraphongtrong/ngaydat={ngaydat}/ngaytra={ngaytra}/soluong={soluong}', 'MobileController@kiemtraphongtrong');

    // lay thong tin user boi user id
    Route::get('mobile/client/getUserById/{userid}', 'MobileController@getUserById');

    // lay thong tin dat phong boi khachhang id
    Route::get('mobile/client/getDatphongByKhachhangid/{khachhangid}', 'MobileController@getDatphongByKhachhangid');


    // thuc hien dat phong
    Route::post('mobile/client/datphong', 'MobileController@datphong');

    // lay paymentintent cua stripe
    Route::get('mobile/client/getPaymentIntent/{sotien}', 'MobileController@getPaymentIntent');

    // auth
    Route::post('mobile/client/login', 'MobileController@loginMobile');
    Route::post('mobile/client/register', 'MobileController@registerMobile');
    // comment
    Route::post('mobile/client/storeComment', 'MobileController@storeComment');
    Route::get('mobile/client/getComment/{phongid}', 'MobileController@getComment');

    // Tìm kiếm phòng
    Route::post('mobile/client/searchPhong', 'MobileController@searchPhong');

    // 
    Route::get('mobile/client/loaiphongAll', 'MobileController@loaiphongAll');
    Route::get('mobile/client/chinhanhAll', 'MobileController@chinhanhAll');
    Route::get('mobile/client/dichvuAll', 'MobileController@dichvuAll');
    Route::get('mobile/client/anuongAll', 'MobileController@anuongAll');
    Route::get('mobile/client/virtualtourByPhongId/{phongid}', 'MobileController@virtualtourByPhongId');
    
    // 
    Route::post('mobile/client/dichvu_datphong_store', 'MobileController@dichvu_datphong_store');
    Route::post('mobile/client/anuong_datphong_store', 'MobileController@anuong_datphong_store');

    Route::post('mobile/game/capnhatdiem', 'IndexController@capnhatdiem');
});
