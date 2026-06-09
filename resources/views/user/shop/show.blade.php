@extends('user.layout.app')
@section('title')
    Product Detail
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('uploads/phones/' . $phone->image) }}" class="img-fluid rounded">
        </div>

        <div class="col-md-6">
            <h2>{{ $phone->name }}</h2>
            <h4 class="text-success">${{ $phone->price }}</h4>
            <p>{{ $phone->description }}</p>

            <a href="/" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Back
            </a>

            <form action="{{ route('cart.add', $phone->id) }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-cart-plus"></i> Add to Cart
                </button>
            </form>

        </div>
    </div>
@endsection
