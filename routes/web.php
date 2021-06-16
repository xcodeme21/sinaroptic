<?php

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

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login-aplikasi', [App\Http\Controllers\Auth\LoginController::class, 'login_form'])->name('login_form');
Route::post('/reloadcaptcha', [App\Http\Controllers\Auth\LoginController::class, 'reloadcaptcha'])->name('reloadcaptcha');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::group(['prefix'=>'backend', 'middleware'=>'auth'], function(){
    Route::get('dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard');
    
	/*MASTER KARYAWAN*/
    Route::get('karyawan', [App\Http\Controllers\Backend\KaryawanController::class, 'index'])->name('karyawan');
    Route::get('karyawan/tambah', [App\Http\Controllers\Backend\KaryawanController::class, 'tambah'])->name('karyawan.tambah');
    Route::post('karyawan/add', [App\Http\Controllers\Backend\KaryawanController::class, 'add'])->name('karyawan.add');
    Route::get('karyawan/edit/{id}', [App\Http\Controllers\Backend\KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::post('karyawan/update', [App\Http\Controllers\Backend\KaryawanController::class, 'update'])->name('karyawan.update');
    Route::get('karyawan/hapus/{id}', [App\Http\Controllers\Backend\KaryawanController::class, 'hapus'])->name('karyawan.hapus');
    
	/*MASTER SUPPLIER*/
    Route::get('supplier', [App\Http\Controllers\Backend\SupplierController::class, 'index'])->name('supplier');
    Route::get('supplier/tambah', [App\Http\Controllers\Backend\SupplierController::class, 'tambah'])->name('supplier.tambah');
    Route::post('supplier/add', [App\Http\Controllers\Backend\SupplierController::class, 'add'])->name('supplier.add');
    Route::get('supplier/edit/{id}', [App\Http\Controllers\Backend\SupplierController::class, 'edit'])->name('supplier.edit');
    Route::post('supplier/update', [App\Http\Controllers\Backend\SupplierController::class, 'update'])->name('supplier.update');
    Route::get('supplier/hapus/{id}', [App\Http\Controllers\Backend\SupplierController::class, 'hapus'])->name('supplier.hapus');    
    
	/*MASTER CUSTOMER*/
    Route::get('customer', [App\Http\Controllers\Backend\CustomerController::class, 'index'])->name('customer');
    Route::get('customer/tambah', [App\Http\Controllers\Backend\CustomerController::class, 'tambah'])->name('customer.tambah');
    Route::post('customer/add', [App\Http\Controllers\Backend\CustomerController::class, 'add'])->name('customer.add');
    Route::get('customer/edit/{id}', [App\Http\Controllers\Backend\CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('customer/update', [App\Http\Controllers\Backend\CustomerController::class, 'update'])->name('customer.update');
    Route::get('customer/hapus/{id}', [App\Http\Controllers\Backend\CustomerController::class, 'hapus'])->name('customer.hapus');
    
    // BARANG -----------------------------------------------------------------------------------------------------------------------------
    
	/*FRAME*/
    Route::get('frame', [App\Http\Controllers\Backend\FrameController::class, 'index'])->name('frame');
    Route::get('frame/tambah', [App\Http\Controllers\Backend\FrameController::class, 'tambah'])->name('frame.tambah');
    Route::post('frame/add', [App\Http\Controllers\Backend\FrameController::class, 'add'])->name('frame.add');
    Route::get('frame/detail/{id}', [App\Http\Controllers\Backend\FrameController::class, 'detail'])->name('frame.detail');
    Route::get('frame/view/{id}', [App\Http\Controllers\Backend\FrameController::class, 'view'])->name('frame.view');
    Route::get('frame/edit/{id}', [App\Http\Controllers\Backend\FrameController::class, 'edit'])->name('frame.edit');
    Route::post('frame/update', [App\Http\Controllers\Backend\FrameController::class, 'update'])->name('frame.update');
    Route::post('frame/updatestatus', [App\Http\Controllers\Backend\FrameController::class, 'updatestatus'])->name('frame.updatestatus');

});
    
