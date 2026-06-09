@extends('user.layout.app')
@section('title')
    Cart
@endsection
@section('content')
    <div class="container mt-4">
        <h3>Your Cart</h3>

        {{-- Empty cart --}}
        @if (empty($cart))
            <p>Your cart is empty.</p>
        @else
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @php $grandTotal = 0; @endphp

                    @foreach ($cart as $id => $item)
                        @php
                            $total = $item['price'] * $item['qty'];
                            $grandTotal += $total;
                        @endphp

                        <tr>
                            <td>
                                <img src="{{ asset('uploads/phones/' . $item['image']) }}" width="60">
                            </td>

                            <td>{{ $item['name'] }}</td>

                            <td>${{ number_format($item['price'], 2) }}</td>

                            {{-- Update Qty --}}
                            <td>
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex">
                                    @csrf
                                    <input type="number" name="qty" value="{{ $item['qty'] }}" min="1"
                                        class="form-control form-control-sm me-2" style="width:70px;">
                                    <button class="btn btn-sm btn-primary">
                                        Update
                                    </button>
                                </form>
                            </td>

                            <td>${{ number_format($total, 2) }}</td>

                            {{-- Remove --}}
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h5 class="text-end">
                Grand Total: ${{ number_format($grandTotal, 2) }}
            </h5>

            <div class="text-end mt-3">
                <a href="{{ route('checkout.index') }}" class="btn btn-success">
                    Proceed to Checkout
                </a>
            </div>
        @endif
    </div>
@endsection
