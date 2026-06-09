<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            padding: 6px;
            text-align: left;
        }

        h2,
        h4 {
            margin: 0;
        }

        h1 {
            text-align: center
        }
    </style>
</head>

<body>
    <h1>PHONE SHOP</h1>
    <h2>Invoice</h2>
    <p><strong>Order ID:</strong> #{{ $order->id }}</p>
    <p><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</p>

    <hr>

    <h4>Customer Information</h4>
    <p>
        <strong>Name:</strong> {{ $order->user->name ?? 'N/A' }} <br>
        <strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}
    </p>

    <h4>Delivery Address</h4>
    <p>
        {{ $order->village }},
        {{ $order->district }},
        {{ $order->city }}
    </p>

    <h4>Order Items</h4>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach ($order->items as $index => $item)
                @php
                    $total = $item->price * $item->qty;
                    $grandTotal += $total;
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->phone_id }}</td>
                    <td>{{ $item->phone_name }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>${{ number_format($total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4 style="text-align:right; margin-top:10px;">
        Grand Total: ${{ number_format($grandTotal, 2) }}
    </h4>

    <hr>

    <p style="text-align:center;">
        Thank you for your purchase!
    </p>

</body>

</html>
