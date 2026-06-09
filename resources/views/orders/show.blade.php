@extends('user.layout.app')
@section('title')
    Order Detail
@endsection
@section('content')
    <div class="container mt-4">
        <h3>Order #{{ $order->id }}</h3>
        <p> <strong>Status:</strong> <span class="badge bg-warning">{{ ucfirst($order->status) }}</span> </p>
        <table class="table">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Phone Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody> @php $grandTotal = 0; @endphp @foreach ($order->items as $item)
                    @php
                        $total = $item->price * $item->qty;
                        $grandTotal += $total;
                    @endphp <tr>
                        <td>{{ $item->phone_id }}</td>
                        <td>{{ $item->phone_name }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>${{ number_format($total, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h5 class="text-end"> Grand Total: ${{ number_format($grandTotal, 2) }} </h5>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3"> Back to Orders </a>
        <a href="{{ route('invoice.download', $order->id) }}" class="btn btn-outline-primary mt-3">
            Download Invoice (PDF)
        </a>
    </div>
@endsection
