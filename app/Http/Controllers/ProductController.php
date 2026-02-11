<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function create()
    {
        if (!auth()->user()->is_admin) {
            return redirect()->route('products.index')->with('error', 'Anda tidak memiliki akses admin.');
        }

        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all(); 

        if ($request->hasFile('image')) {
            try {
                $path = $request->file('image')->store('products', 'public');
                $data['image'] = $path;
            } catch (\Exception $e) {
                return back()->withErrors(['image' => 'Gagal mengunggah gambar: ' . $e->getMessage()]);
            }
        }

        Product::create($data); 
        
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        if (!auth()->user()->is_admin) {
            return redirect()->route('products.index')->with('error', 'Akses ditolak.');
        }

        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        if (!auth()->user()->is_admin) {
            return redirect()->route('products.index')->with('error', 'Akses ditolak.');
        }

        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}