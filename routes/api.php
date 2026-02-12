<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::apiResource('products', ProductController::class);

Route::get('/list-produk', function () {
    return response()->json([
        'success' => true,
        'message' => 'Daftar produk berhasil diambil',
        'data' => Product::with('category')->get()
    ]);
});