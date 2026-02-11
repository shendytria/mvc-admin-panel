<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Tambah Kategori') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('categories.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow space-y-4">
                @csrf
                <div>
                    <x-input-label for="name" :value="__('Nama Kategori')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
                </div>
                <div>
                    <x-input-label for="description" :value="__('Deskripsi')" />
                    <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                </div>
                <x-primary-button>{{ __('Simpan') }}</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>