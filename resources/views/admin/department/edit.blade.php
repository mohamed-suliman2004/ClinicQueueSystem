@extends('admin.layouts.layout')
@section('title','Edit Department')
@section('admin-content')
<div class="card">
    <div class="card-header">Edit Department</div>
    <div class="card-body">
        <form action="{{ route('admin.departments.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="role">Name</label>
                 <input type="text" name="name" id="name" value="{{$department->name}}" class="form-control" required >
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update</button>
        </form>

    </div>
</div>
@endsection
