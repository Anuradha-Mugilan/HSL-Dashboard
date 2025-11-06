@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <x-alert-success />
                <x-alert-error />
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    <!-- Product Name -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Product Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               class="border rounded w-full p-2 @error('name') border-red-500 @enderror">
                    </div>

                    <!-- Price -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Price ($)</label>
                        <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                               class="border rounded w-full p-2 @error('price') border-red-500 @enderror">
                    </div>

                    <!-- Stock -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Stock</label>
                        <input type="number" name="stock" value="{{ old('stock') }}"
                               class="border rounded w-full p-2 @error('stock') border-red-500 @enderror">
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Description</label>
                        <textarea name="description" rows="3"
                                  class="border rounded w-full p-2 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end">
                        <a href="{{ route('products.index') }}"
                           class="mr-2 px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Cancel</a>
                        <button type="submit"
                                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                            Save Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
