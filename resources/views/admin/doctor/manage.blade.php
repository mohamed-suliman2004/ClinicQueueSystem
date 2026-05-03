@extends('admin.layouts.layout')
@section('title','Manage Doctors')
@section('admin-content')
<div class="container py-4">
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h2 class="fw-bold mb-1">Manage Doctors <i class="fas fa-users text-primary ms-2"></i></h2>
            <p class="text-muted">All System Doctors</p>
        </div>
        <div class="search-wrapper">
            <input type="text" class="form-control live-search-input" data-search-target="table tbody" placeholder="Search doctors...">
        </div>
    </div>
    <div class="card">
        <div class="card-header">Manage Doctors</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Department</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                <tr class="user-item-admin" data-user-name="{{ strtolower($doctor->name) }}">
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->email }}</td>
                    <td>{{ $doctor->phone }}</td>
                    <td>{{ $doctor->department->name }}</td>
                    <td>
                         <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('admin.doctors.delete', $doctor->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection
