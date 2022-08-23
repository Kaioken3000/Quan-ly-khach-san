<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LoaiphongController;
use App\Http\Controllers\PhongController;

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
    return view('index');
});

Route::resource('companies', CompanyController::class);
Route::resource('loaiphongs', LoaiphongController::class);
Route::resource('phongs', PhongController::class);
Route::post('loaiphongs-search', '\App\Http\Controllers\LoaiphongController@search');
Route::post('loaiphongs/loaiphongs-search', '\App\Http\Controllers\LoaiphongController@search');
Route::post('phongs-search', '\App\Http\Controllers\phongController@search');
Route::post('phongs/phongs-search', '\App\Http\Controllers\phongController@search');
