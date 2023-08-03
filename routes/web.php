<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function(){
    Route::controller(AuthController::class)->group(function(){
        Route::get('/', 'login')->name('login');
        Route::post('/auth', 'auth')->name('auth');

        Route::get('/register', 'register')->name('register');
        Route::post('/store/register', 'store')->name('store');
    });

    // Route::controller(AbsensiController::class)->name('absensi.')->group(function(){
    //     Route::get('absensi-karyawan','absensi')->name('karyawan');
    //     Route::post('absensi-karyawan','store')->name('karyawan.store');
    // });

});


Route::middleware(['auth'])->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/dashboard-chart', 'dashboardChart')->name('dashboardChart');
    });

    // Route::controller(KaryawanController::class)->prefix('karyawan')->name('karyawan.')->group(function(){
    //     Route::get('/datatable', 'datatable')->name('datatable');
    //     Route::get('/datatable-karyawan/{id}', 'datatableAbsen')->name('datatableAbsen');

    //     Route::get('/', 'index')->name('index');
    //     Route::post('/store', 'store')->name('store');
    //     Route::get('/detail/{id}', 'detail')->name('detail');
    //     Route::get('/edit/{id}', 'edit')->name('edit');
    //     Route::post('/edit/{id}', 'update')->name('update');
    // });

    // Route::controller(AbsensiController::class)->prefix('absensi')->name('absensi.')->group(function(){
    //     Route::get('/datatable', 'datatable')->name('datatable');
    //     Route::get('/', 'index')->name('index');
    // });

    // Route::controller(ExportControlller::class)->prefix('export')->name('export.')->group(function(){
    //     Route::get('/excel', 'excel')->name('excel');
    //     Route::get('/pdf', 'pdf')->name('pdf');
    // });

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
