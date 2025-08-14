<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'get'])->name('home');
Route::post('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::delete('/product/{id}', [ProductController::class, 'delete'])
    ->name('product.delete');
Route::patch('/product/{id}/stok', [ProductController::class, 'updateStockStatus'])
    ->name('product.updateStockStatus');
