@extends('layouts.app')

@section('content')
<h1>Edit Student</h1>

<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control"
            value="{{ old('name', $student->name ?? '') }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control"
            value="{{ old('email', $student->email ?? '') }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control"
            value="{{ old('phone', $student->phone ?? '') }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Class</label>
        <input type="text" name="class_name" class="form-control"
            value="{{ old('class_name', $student->class_name ?? '') }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Photo</label>

        @if ($student->photo_path)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $student->photo_path) }}" alt="Student Photo" width="120" class="img-thumbnail">
        </div>
        @endif

        <input type="file"
            name="photo_path"
            class="form-control @error('photo_path') is-invalid @enderror"
            accept="image/*">

        @error('photo_path')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button class="btn btn-primary">Save</button>


</form>

@endsection