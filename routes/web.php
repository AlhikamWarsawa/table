<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::resource('/', ProductController::class);

Route::redirect('/products', '/products/create');
Route::resource('/products', ProductController::class);

Route::post('/products/deleteAll', [ProductController::class, 'deleteAll'])->name('products.deleteAll');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
