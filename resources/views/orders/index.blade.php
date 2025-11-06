@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold">Orders</h2>
                    <a href="{{ route('orders.create') }}" 
                       class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">
                        Place New Order
                    </a>
                </div>

                <x-alert-success />
                <x-alert-error />

                <table class="min-w-full border">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="px-4 py-2 border">#</th>
                            <th class="px-4 py-2 border">Product</th>
                            <th class="px-4 py-2 border">Quantity</th>
                            <th class="px-4 py-2 border">Amount</th>
                            <th class="px-4 py-2 border">Ordered By</th>
                            <th class="px-4 py-2 border">Status</th>
                            <th class="px-4 py-2 border">Date</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 border">{{ $order->product->name }}</td>
                                <td class="px-4 py-2 border">{{ $order->quantity }}</td>
                                <td class="px-4 py-2 border">{{ $order->total_price }}</td>
                                <td class="px-4 py-2 border">{{ $order->user->name }}</td>
                                <td class="px-4 py-2 border">{{ $order->status }}</td>
                                <td class="px-4 py-2 border">{{ $order->created_at->format('d M Y, H:i') }}</td>
                                <td>
                                    @if(Auth::user()->isHsl() && ($order->status !== 'dispatched' && $order->status !== 'delivered'))
                                        <form action="{{ route('orders.dispatch', $order) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                    class="px-2 py-1 bg-green-600 text-white rounded hover:bg-green-700">
                                                Dispatch
                                            </button>
                                        </form>
                                    @elseif(Auth::user()->isProvider() && $order->status === 'dispatched')
                                        <form action="{{ route('orders.deliver', $order) }}" method="POST" class="inline ml-2">
                                            @csrf
                                            <button type="submit"
                                                    class="px-2 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">
                                                Received
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-500">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 border text-center">No orders found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
