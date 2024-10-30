<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopifyController;

Route::get('/', function () {
    return view('welcome');
})->middleware(['verify.shopify'])->name('home');


Route::get('/products', [ShopifyController::class, 'getProducts'])
    ->middleware(['verify.shopify'])
    ->name('products');