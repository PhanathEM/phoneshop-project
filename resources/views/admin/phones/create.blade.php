@extends('admin.layout.app')

@section('content')
    <h2>Add Phone</h2>

    <form action="/admin/phones" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-2">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-2">
            <label>Brand</label>
            <input type="text" name="brand" class="form-control">
        </div>

        <div class="mb-2">
            <label>Price</label>
            <input type="number" name="price" class="form-control">
        </div>

        <div class="mb-2">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-2">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="form-check mt-2">
            <input class="form-check-input" type="checkbox" name="is_new" value="1"
                {{ old('is_new', $phone->is_new ?? false) ? 'checked' : '' }}>

            <label class="form-check-label">
                Modern / New Phone
            </label>
        </div>

        <button class="btn btn-success">Save</button>
    </form>
@endsection
