<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\reglogController;
use App\Http\Controllers\profilController;
use App\Http\Controllers\predictController;

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
//CLEAR CACHE
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// MIDDLEWARE BELUM LOGIN
Route::get('/', function () {
    return view('reglog.login');
})->middleware('belumLogin');

// Route::get('login', [reglogController::class, 'login']);
Route::post('proses-regist', [reglogController::Class, 'proreg']);
Route::post('proses-login', [reglogController::class, 'prolog']);
Route::get('aboutus', function(){
    return view('template.aboutus');
});

// MIDDLEWARE SUDAH LOGIN
Route::group(['middleware' => 'sudahLogin'], function(){
    Route::get('predict', [predictController::class, 'index'])->middleware('add.token');
    Route::resource('profile', profilController::class);
    Route::get('logout', [reglogController::class, 'epilog']);

    Route::group(['middleware' => 'add.token'], function(){
        Route::post('proses-predict', [predictController::class, 'prosesPredict']);
        Route::post('proses-edit', [profilController::class, 'edit']);
        Route::get('report', [predictController::class, 'report']);
    });
});
