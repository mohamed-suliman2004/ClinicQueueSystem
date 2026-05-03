@extends('admin.layouts.layout')
@section('title','Edit Doctor')
@section('admin-content')
<div class="card">
    <div class="card-header">Edit Doctor</div>
    <div class="card-body">
        <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="role">Name</label>
                 <input type="text" name="name" id="name" value="{{$doctor->name}}" class="form-control" required >
            </div>
              <div class="form-group">
                            <label for="price">Email</label>
                            <input type="text" class="form-control" value="{{$doctor->email}}" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" value="{{$doctor->phone}}" name="phone" id="phone" required>
                        </div>
                           <div class="form-group">
                            <label for="department">Department</label>
                            <select name="department" id="department" class="form-control">
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" {{ $doctor->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
            <button type="submit" class="btn btn-primary mt-2">Update</button>
        </form>

    </div>
</div>
@endsection
