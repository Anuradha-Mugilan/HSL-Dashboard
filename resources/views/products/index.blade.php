@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold">Products</h2>
                    <a href="{{ route('products.create') }}"
                       class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">
                        Add New Product
                    </a>
                </div>

                <x-alert-success />
                <x-alert-error />

                <table class="min-w-full border">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="px-4 py-2 border">#</th>
                            <th class="px-4 py-2 border">Name</th>
                            <th class="px-4 py-2 border">Description</th>
                            <th class="px-4 py-2 border">Price</th>
                            <th class="px-4 py-2 border">Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 border">{{ $product->name }}</td>
                                <td class="px-4 py-2 border">{{ $product->description }}</td>
                                <td class="px-4 py-2 border">${{ number_format($product->price, 2) }}</td>
                                <td class="px-4 py-2 border">{{ $product->stock }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 border text-center">No products found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
