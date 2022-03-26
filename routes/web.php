<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use mysql_xdevapi\Session;

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

require __DIR__.'/auth.php';
Route::get('/local/ru',[CartController::class,'changeToRu'])->name('Ru');
Route::get('/local/en',[CartController::class,'changeToEn'])->name('En');
Route::resource('brands',BrandController::class,)->middleware('admin');
Route::resource('products',ProductController::class,)->middleware('admin');
Route::resource('categories', CategoryController::class)->middleware('admin');
Route::get('/', [CartController::class,'shop'])->name('home');
Route::get('/cart', [CartController::class,'cart'])->name('cart.index');
Route::post('/add', [CartController::class,'add'])->name('cart.store');
Route::post('/update', [CartController::class,'update'])->name('cart.update');
Route::post('/remove', [CartController::class,'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class,'clear'])->name('cart.clear');
Route::get('/category',[CategoryController::class,'category'])->name('category.list');
Route::get('/category/id',[CategoryController::class,'getCategory'])->name('category.chosed');
Route::get('/brand',[BrandController::class,'brand'])->name('brand.list');
Route::get('/brand/index',[BrandController::class,'getBrand'])->name('brand.chosed');
Route::get('/product/{id}', [ProductController::class,'id'])->name('product.id');
