@extends('admin.layout.app')

@section('content')
    <section class="content-header">
        <h1>Order #{{ $order->id }}</h1>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">

                <p><strong>User ID:</strong> {{ $order->user_id }}</p>
                <p><strong>Total:</strong> ${{ number_format($order->total_price, 2) }}</p>

                {{-- ✅ Delivery Address --}}
                <hr>
                <h5>Delivery Address</h5>
                <p>
                    <strong>Village:</strong> {{ $order->village }} <br>
                    <strong>District:</strong> {{ $order->district }} <br>
                    <strong>City:</strong> {{ $order->city }}
                </p>

                {{-- Update status --}}
                <form action="{{ route('admin.orders.status', $order->id) }}" method="POST" class="mb-3">
                    @csrf
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" style="width:200px;">
                            <option value="pending" @selected($order->status == 'pending')>Pending</option>
                            <option value="confirmed" @selected($order->status == 'confirmed')>Confirmed</option>
                            <option value="completed" @selected($order->status == 'completed')>Completed</option>
                        </select>
                    </div>
                    <button class="btn btn-success btn-sm mt-2">
                        Update Status
                    </button>
                </form>

                {{-- Order items --}}
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Phone ID</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td>{{ $item->phone_id }}</td>
                                <td>${{ number_format($item->price, 2) }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>${{ number_format($item->price * $item->qty, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
                    Back
                </a>
                <a href="{{ route('invoice.download', $order->id) }}" class="btn btn-primary mb-3 mt-3">
                    Download Invoice
                </a>
            </div>
        </div>
    </section>
@endsection
