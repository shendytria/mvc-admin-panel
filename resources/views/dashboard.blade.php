<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Katalog Produk Kami') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900">Jelajahi Koleksi Kami</h3>
                    <p class="text-gray-600">Temukan produk terbaik dari kategori pilihan Anda.</p>
                </div>
            </div>

            <div class="mb-8 flex flex-wrap gap-2">
                <a href="{{ route('dashboard') }}" 
                   class="px-4 py-2 rounded-full text-sm font-semibold transition {{ !request('category') ? 'bg-indigo-600 text-white shadow-md' : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50' }}">
                    Semua Produk
                </a>
                @foreach(\App\Models\Category::all() as $cat)
                    <a href="{{ route('dashboard', ['category' => $cat->id]) }}" 
                       class="px-4 py-2 rounded-full text-sm font-semibold transition {{ request('category') == $cat->id ? 'bg-indigo-600 text-white shadow-md' : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50' }}">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $query = \App\Models\Product::with('category')->latest();
                    if(request('category')) {
                        $query->where('category_id', request('category'));
                    }
                    $products = $query->get();
                @endphp

                @forelse ($products as $product)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition group">
                        <div class="relative aspect-square overflow-hidden bg-gray-100">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h4 class="text-gray-900 font-bold text-lg truncate mb-1">{{ $product->name }}</h4>
                            <p class="text-indigo-600 font-extrabold text-xl mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-gray-500 italic">Stok: {{ $product->stock }}</span>
                                <a href="{{ route('products.show', $product->id) }}" class="text-xs font-bold text-indigo-600 hover:underline">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-white p-12 rounded-2xl border-2 border-dashed text-center">
                        <p class="text-gray-500">Tidak ada produk dalam kategori ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>