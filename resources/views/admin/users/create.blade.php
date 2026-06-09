@extends('admin.layout.app')

@section('content')
    <section class="content-header">
        <h1>Add User</h1>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <button class="btn btn-success mt-3">Save</button>

                </form>

            </div>
        </div>
    </section>
@endsection
