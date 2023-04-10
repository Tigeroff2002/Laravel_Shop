<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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

Route::get('/', [ProductsController::class, 'index'])->name('product.index');
Route::get("create", [ProductsController::class, "createGet"])->name('product.createGet');
Route::post("createPost", [ProductsController::class, "createPost"])->name('product.createPost');
Route::get("edit/{productId}", [ProductsController::class, "editGet"])->name('product.editGet');
Route::post("editPost", [ProductsController::class, "editPost"])->name('product.editPost');
Route::get("delete/{productId}", [ProductsController::class, "delete"])->name('product.delete');
Route::get("cartDetails", [ProductsController::class, "cartGet"])->name('product.cartGet');
Route::post("addToCart/{productId}", [ProductsController::class, "addToCart"]);
Route::get("clearCart", [ProductsController::class, "clearCart"])->name('product.clearCart');
