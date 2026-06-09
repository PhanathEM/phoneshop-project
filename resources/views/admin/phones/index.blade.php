@extends('admin.layout.app')

@section('content')
    <h2>Phone List</h2>

    <a href="/admin/phones/create" class="btn btn-primary mb-3">Add Phone</a>

    <table class="table table-bordered align-middle">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        @foreach ($phones as $phone)
            <tr>
                <td>{{ $phone->id }}</td>

                <td>
                    @if ($phone->image)
                        <img src="{{ asset('uploads/phones/' . $phone->image) }}" width="70" height="70"
                            style="object-fit: cover;">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>

                <td>{{ $phone->name }}</td>
                <td>{{ $phone->brand }}</td>
                <td>${{ $phone->price }}</td>

                <td>
                    <a href="/admin/phones/{{ $phone->id }}/edit" class="btn btn-sm btn-warning">
                        Edit
                    </a>

                    <form action="/admin/phones/{{ $phone->id }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this phone?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
