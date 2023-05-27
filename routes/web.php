<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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
    return view('welcome');
});

Route::get('/', [DashboardController::class, 'index'])->name('index');
// Route::get('/', [AuthController::class, 'index'])->name('index');

Route::group(['prefix' => 'categories'], function () {
    Route::get('list', [CategoryController::class, 'list'])->name('categories.list');
    Route::post('store', [CategoryController::class, 'store'])->name('categories.store');
    Route::post('delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete'); 
});

Route::group(['prefix' => 'products'], function () {
    Route::get('list', [ProductController::class, 'list'])->name('products.list');
    Route::post('store', [ProductController::class, 'store'])->name('products.store');
    Route::post('update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::post('delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
});

Route::group(['prefix' => 'orders'], function () {
    Route::get('list', [OrderController::class, 'list'])->name('orders.list');
    Route::get('history', [OrderController::class, 'history'])->name('orders.history');
});
