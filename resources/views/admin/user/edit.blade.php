@extends('admin.layouts.layout')
@section('title','Edit User')
@section('admin-content')
<div class="card">
    <div class="card-header">Edit User</div>
    <div class="card-body">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
    <option value="reception" {{ $user->role == 'reception' ? 'selected' : '' }}>Reception</option>
    <option value="patient" {{ $user->role == 'patient' ? 'selected' : '' }}>Patient</option>
</select>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update</button>
        </form>

    </div>
</div>

@endsection
