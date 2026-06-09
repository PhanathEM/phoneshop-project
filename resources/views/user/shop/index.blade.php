@extends('user.layout.app')
@section('title')
    Home
@endsection
@section('content')
    {{-- carousel --}}
    @if (!request('search'))
        @include('user.shop.carousel')
    @endif

    {{-- Modern Phone --}}
    <div class="bg-light shadow-sm">
        @if ($newPhones->count())
            <h4 class="p-4">Modern New Phones</h4>
            <div class="product-scroll d-flex gap-3 overflow-auto pb-4">
                @foreach ($newPhones as $phone)
                    <div class="product-card bg-white rounded shadow-sm p-3 flex-shrink-0">
                        <span class="badge bg-success">NEW</span>
                        <img src="{{ asset('uploads/phones/' . $phone->image) }}" class="img-fluid mb-2">
                        <p class="fw-semibold small mb-1">
                            {{ $phone->name }}
                        </p>
                        <span class="text-danger fw-bold">
                            ${{ number_format($phone->price, 2) }}
                        </span>
                        <form action="{{ route('cart.add', $phone->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-success btn-sm rounded-circle cart-btn">
                                <i class="bi bi-cart"></i>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Available Phone --}}
    <h3 class="mb-4 mt-4">Available Phones</h3>
    <div class="row g-3">
        @foreach ($phones as $phone)
            <div class="col-5-custom col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <div class="card h-100 shadow-sm">

                    <img src="{{ asset('uploads/phones/' . $phone->image) }}" class="card-img-top img-fluid"
                        style="height:180px; object-fit:cover;">

                    <div class="card-body p-2">
                        <h6 class="mb-1">{{ $phone->name }}</h6>
                        <p class="mb-2 fw-bold text-danger">${{ number_format($phone->price, 2) }}</p>
                        <a href="{{ route('products.show', $phone->id) }}" class="btn btn-primary btn-sm">
                            See Details
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $phones->links('pagination::bootstrap-5') }}
    </div>
@endsection
