@extends('admin.layouts.layout')
@section('title','Manage Departments')
@section('admin-content')
<div class="container py-4">
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h2 class="fw-bold mb-1">Manage Departments <i class="fas fa-users text-primary ms-2"></i></h2>
            <p class="text-muted">All System Departments</p>
        </div>
        <div class="search-wrapper">
            <input type="text" class="form-control live-search-input" data-search-target="table tbody" placeholder="Search departments...">
        </div>
    </div>
    <div class="card">
        <div class="card-header">Manage Departments</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                <tr class="user-item-admin" data-user-name="{{ strtolower($department->name) }}">
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $department->name }}</td>
                    <td>
                         <a href="{{ route('admin.departments.edit', $department->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('admin.departments.delete', $department->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
