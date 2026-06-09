@extends('admin.layout.app')

@section('content')
    <h2>Edit Phone</h2>

    <form action="/admin/phones/{{ $phone->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label>Name</label>
            <input type="text" name="name" value="{{ $phone->name }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Brand</label>
            <input type="text" name="brand" value="{{ $phone->brand }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Price</label>
            <input type="number" name="price" value="{{ $phone->price }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $phone->description }}</textarea>
        </div>

        <div class="mb-2">
            <label>Image</label>
            <input type="file" name="image" class="form-control">

            @if ($phone->image)
                <img src="{{ asset('uploads/phones/' . $phone->image) }}" width="120" class="mt-2">
            @endif
        </div>
        <div class="form-check mt-2">
            <input class="form-check-input" type="checkbox" name="is_new" value="1"
                {{ old('is_new', $phone->is_new ?? false) ? 'checked' : '' }}>

            <label class="form-check-label">
                Modern / New Phone
            </label>
        </div>
        <a href="{{ route('admin.phones.index') }}" class="btn btn-secondary mt-3">
            Back
        </a>
        <button class="btn btn-primary mt-3">Update</button>
    </form>
@endsection
