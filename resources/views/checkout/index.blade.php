@extends('user.layout.app')
@section('title')
    Checkout
@endsection
@section('content')
    <div class="container mt-4">
        <h3>Checkout</h3>

        {{-- Order summary --}}
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                @php $grandTotal = 0; @endphp
                @foreach ($cart as $item)
                    @php
                        $total = $item['price'] * $item['qty'];
                        $grandTotal += $total;
                    @endphp
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                        <td>{{ $item['qty'] }}</td>
                        <td>${{ number_format($total, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h5 class="text-end mb-4">
            Grand Total: ${{ number_format($grandTotal, 2) }}
        </h5>

        {{-- Checkout form --}}
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf

            <h5 class="mb-3">Delivery Address</h5>

            <div class="row mb-4">
                {{-- City --}}
                <div class="col-md-4">
                    <label class="form-label">City</label>
                    <select name="city" class="form-control" required>
                        <option value="Vientiane Capital">Vientiane Capital</option>
                    </select>
                </div>

                {{-- District --}}
                <div class="col-md-4">
                    <label class="form-label">District</label>
                    <select name="district" class="form-control" required>
                        <option value="">-- Select District --</option>
                        <option value="Chanthabuly">Chanthabuly</option>
                        <option value="Sikhottabong">Sikhottabong</option>
                    </select>
                </div>

                {{-- Village --}}
                <div class="col-md-4">
                    <label class="form-label">Village</label>
                    <select name="village" class="form-control" required>
                        <option value="">-- Select Village --</option>

                        {{-- Chanthabuly --}}
                        <optgroup label="Chanthabuly">
                            <option>Anou</option>
                            <option>Mixay</option>
                            <option>Haysoke</option>
                            <option>Sibounheuang</option>
                            <option>Xieng Ngeun</option>
                            <option>Nongbone</option>
                            <option>Phonxay</option>
                            <option>Hatsady</option>
                            <option>Nongduang</option>
                            <option>Saylom</option>
                            <option>Sisaket</option>
                            <option>Simuang</option>
                            <option>Nongchan</option>
                            <option>Phiavat</option>
                            <option>Phonthan Neua</option>
                            <option>Phonthan Tai</option>
                            <option>Naxay</option>
                            <option>Khunta</option>
                        </optgroup>

                        {{-- Sikhottabong --}}
                        <optgroup label="Sikhottabong">
                            <option>Dongpaina</option>
                            <option>Nongbone</option>
                            <option>Naxaythong</option>
                            <option>Donkoi</option>
                            <option>Phontan</option>
                            <option>Nonghai</option>
                            <option>Nongviengkham</option>
                            <option>Thongkhankham</option>
                            <option>Dongmakkhai</option>
                            <option>Sokpaluang</option>
                            <option>Phontong</option>
                            <option>Thadeua</option>
                            <option>Phonsinuan</option>
                            <option>Dongnasokneua</option>
                            <option>Dongnasok</option>
                            <option>Nonsavang</option>
                            <option>Nongthakham</option>
                            <option>Naxeng</option>
                            <option>Sikhai</option>
                        </optgroup>
                    </select>
                </div>
            </div>

            {{-- Confirm --}}
            <div class="text-end">
                <button class="btn btn-primary">
                    Confirm Order
                </button>
            </div>
        </form>
    </div>
@endsection
