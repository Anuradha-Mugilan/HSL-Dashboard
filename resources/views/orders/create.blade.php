@extends('layouts.app')

@section('content')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Success Message --}}
                    <x-alert-success />

                    {{-- Validation Errors --}}
                    <x-alert-error />

                    {{-- Order Form --}}
                    <form method="POST" action="{{ route('orders.store') }}">
                        @csrf

                        <!-- Product -->
                        <div>
                            <label for="product_id" class="block font-medium text-sm text-gray-700">
                                {{ __('Select Product') }}
                            </label>
                            <select name="product_id" id="product_id"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">-- Choose a Product --</option>
                                @foreach ($products as $product)
                                    @if($product->stock > 0)
                                        <option value="{{ $product->id }}"
                                            {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                            {{ $product->name }} ({{ $product->stock }})
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <!-- Quantity -->
                        <div class="mt-4">
                            <label for="quantity" class="block font-medium text-sm text-gray-700">
                                {{ __('Quantity') }}
                            </label>
                            <input id="quantity" name="quantity" type="number" min="1"
                                value="{{ old('quantity', 1) }}"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                required>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md
                                font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700
                                active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Place Order') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
