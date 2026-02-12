<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Produk: ') }} {{ $product->name }}
            </h2>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                &larr; Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="md:col-span-1">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full rounded-xl shadow-md border">
                            @else
                                <div class="w-full aspect-square bg-gray-100 flex items-center justify-center rounded-xl border text-gray-400">
                                    Tidak ada foto
                                </div>
                            @endif
                        </div>

                        <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                            <h3 class="text-lg font-bold mb-4 border-b pb-2">Informasi Produk</h3>
                            <div class="space-y-3">
                                <div>
                                    <span class="text-sm text-gray-500 block">Nama Produk</span>
                                    <p class="text-base font-semibold">{{ $product->name }}</p>
                                </div>
                                <div>
                                    <span class="text-sm text-gray-500 block">Harga</span>
                                    <p class="text-base font-semibold text-indigo-600">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </p>
                                </div>
                                <div>
                                    <span class="text-sm text-gray-500 block">Stok Tersedia</span>
                                    <p class="text-base font-semibold">{{ $product->stock }} unit</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold mb-4 border-b pb-2">Kategori Terkait</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                @if($product->category)
                                    <span class="text-sm text-gray-500 block">Nama Kategori</span>
                                    <p class="text-base font-semibold mb-2">{{ $product->category->name }}</p>
                                    
                                    <span class="text-sm text-gray-500 block">Deskripsi Kategori</span>
                                    <p class="text-sm text-gray-600 italic">
                                        {{ $product->category->description ?? 'Tidak ada deskripsi kategori.' }}
                                    </p>
                                @else
                                    <p class="text-sm text-gray-500">Produk ini tidak memiliki kategori.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-6 border-t text-sm text-gray-400">
                        Data ini dibuat pada: {{ $product->created_at->format('d M Y, H:i') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>