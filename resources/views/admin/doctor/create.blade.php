@extends('admin.layouts.layout')
@section('title','Create Doctor')
@section('admin-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Doctor</div>
                <div class="card-body">
                    <form action="{{ route('admin.doctors.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Email</label>
                            <input type="text" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" required>
                        </div>
                           <div class="form-group">
                            <label for="department">Department</label>
                            <select name="department" id="department" class="form-control">
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Create</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
