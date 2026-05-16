@extends('admin.layouts.layout')
@section('title','Manage Users')
@section('admin-content')
<div class="container py-4">
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h2 class="fw-bold mb-1">Manage Users <i class="fas fa-users text-primary ms-2"></i></h2>
            <p class="text-muted">All System users</p>
        </div>
        <div class="search-wrapper">
            <input type="text" class="form-control live-search-input" data-search-target="table tbody" placeholder="Search users...">
        </div>
    </div>
    <div class="card">
        <div class="card-header">Manage Users</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="user-item-admin" data-user-name="{{ strtolower($user->name) }}" data-user-email="{{ strtolower($user->email) }}">
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>

                         <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        {{-- <a href="{{ route('admin.users.delete', $user->id) }}" class="btn btn-danger">Delete</a> --}}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection
