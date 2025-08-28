<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/', fn() => redirect()->route('products.index'));
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::post('/products/{product}/update', [ProductController::class, 'update'])->name('products.update'); 
Route::delete('/products/{product}/delete', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');