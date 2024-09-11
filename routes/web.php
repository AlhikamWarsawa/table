<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

// Index
Route::resource('/', ProductController::class);

// Create
Route::redirect('/products', '/products/create');

// Store
Route::resource('/products', ProductController::class);

// Delete
Route::post('/products/deleteAll', [ProductController::class, 'deleteAll'])->name('products.deleteAll');

// Update
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

// Search
Route::get('/products/view/{title}', [ProductController::class, 'search'])->name('products.search');

// Mass Edit
Route::get('/products/mass_edit_form', [ProductController::class, 'massEditForm'])->name('products.mass_edit_form');
Route::post('/products/mass-edit', [ProductController::class, 'massEdit'])->name('products.mass_edit');
