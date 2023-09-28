<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\ProductTypeController;
use App\Http\Controllers\Admin\Product\ProductUnitController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\ProductListController;
use App\Http\Controllers\User\TransactionController;

Route::get('/', [ProductListController::class, 'index'])->name('homepage');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');

Route::get('/pendaftaran-akun', [UserController::class, 'register'])->name('register');
Route::post('/pendaftaran-akun/daftar', [UserController::class, 'registration'])->name('registration');

Route::get('/kategori/{product_types:id}', [ProductListController::class, 'categories'])->name('categories');
Route::get('/detail-produk/{products:id}', [ProductListController::class, 'detailProduct'])->name('detail.product');
Route::post('/checkout/{products:id}', [TransactionController::class, 'checkout'])->name('checkout');
Route::get('/checkout-list', [TransactionController::class, 'checkoutList'])->name('checkout.list');
Route::post('/buy', [TransactionController::class, 'buy'])->name('buy');


Route::middleware('auth')->group(function(){

  Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  
    Route::get('/produk/jenis-produk', [ProductTypeController::class, 'index'])->name('product.type');
    Route::post('/produk/jenis-produk/store', [ProductTypeController::class, 'store'])->name('store.product.type');
    Route::post('/produk/jenis-produk/update/{product_types:id}', [ProductTypeController::class, 'update'])->name('update.product.type');
    Route::delete('/produk/jenis-produk/delete/{product_types:id}', [ProductTypeController::class, 'delete'])->name('delete.product.type');
  
    Route::get('/produk/satuan-produk', [ProductUnitController::class, 'index'])->name('product.unit');
    Route::post('/produk/satuan-produk/store', [ProductUnitController::class, 'store'])->name('store.product.unit');
    Route::post('/produk/satuan-produk/update/{product_units:id}', [ProductUnitController::class, 'update'])->name('update.product.unit');
    Route::delete('/produk/satuan-produk/delete/{product_units:id}', [ProductUnitController::class, 'delete'])->name('delete.product.unit');
    
    Route::get('/produk/semua-produk', [ProductController::class, 'index'])->name('products');
    Route::get('/produk/semua-produk/tambah', [ProductController::class, 'create'])->name('add.product');
    Route::post('/produk/semua-produk/store', [ProductController::class, 'store'])->name('store.product');
    Route::get('/produk/semua-produk/edit/{products:id}', [ProductController::class, 'edit'])->name('edit.product');
    Route::post('/produk/semua-produk/update/{products:id}', [ProductController::class, 'update'])->name('update.product');
    Route::delete('/produk/semua-produk/delete/{products:id}', [ProductController::class, 'delete'])->name('delete.product');
  
    Route::get('/laporan/penjualan', [ReportController::class, 'index'])->name('reports');
    Route::get('/laporan/detail-transaksi', [ReportController::class, 'detail'])->name('transaction.detail');
  });
  
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});