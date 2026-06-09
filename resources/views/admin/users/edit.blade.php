@extends('admin.layout.app')

@section('content')
    <section class="content-header">
        <h1>Edit User</h1>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" value="{{ $user->name }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" value="{{ $user->email }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control">
                            <option value="user" @selected($user->role == 'user')>User</option>
                            <option value="admin" @selected($user->role == 'admin')>Admin</option>
                        </select>
                    </div>

                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-3">
                        Back
                    </a>
                    <button class="btn btn-success mt-3">Update</button>

                </form>

            </div>
        </div>
    </section>
@endsection
