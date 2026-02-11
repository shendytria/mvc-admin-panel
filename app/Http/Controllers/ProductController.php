<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {
        $query = Product::with('category');

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->get();
        return view('products.index', compact('products'));
    }

    public function show($id) {
        $product = Product::with('category')->findOrFail($id);
        return view('products.show', compact('product'));
    }
}