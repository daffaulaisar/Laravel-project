<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\Dashboardcontroller;
use App\Http\Controllers\Admin\DashboardCustomer;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\PenerbanganController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

//grup route untuk admin
Route::prefix('admin')->group(function(){
    //route utk auth
    Route::group(['middleware'=> 'auth'], function(){
        //route untuk dashboard 
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
        //buat route untuk data customer
    route::resource('/customer', CustomerController::class, ['as' => 'admin'] );
    //buat route untuk data penerbangan
    route::resource('/penerbangan', PenerbanganController::class, ['as' => 'admin'] );
     //buat route untuk data booking
    route::resource('/booking', BookingController::class, ['as' => 'admin'] );
     //buat route untuk data pembayaran
    route::resource('/pembayaran', PembayaranController::class, ['as' => 'admin'] );

    });
});
