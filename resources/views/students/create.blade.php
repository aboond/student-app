@extends('layouts.app')

@section('content')
<h1>Add Student</h1>
<form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
 @csrf
 <div class="mb-3">
 <label class="form-label">Name</label>
 <input type="text" name="name" value="{{ old('name') }}"
 class="form-control @error('name') is-invalid @enderror">
@error('name')
 <div class="invalid-feedback">{{ $message }}</div>
@enderror
 </div>
 <div class="mb-3">
 <label class="form-label">Email</label>
 <input type="text" name="email" value="{{ old('email') }}"
 class="form-control @error('email') is-invalid @enderror">
@error('email')
 <div class="invalid-feedback">{{ $message }}</div>
@enderror
 </div>
 <div class="mb-3">
 <label class="form-label">Phone</label>
<input type="text" name="phone" value="{{ old('phone') }}"
 class="form-control @error('phone') is-invalid @enderror">
@error('phone')
 <div class="invalid-feedback">{{ $message }}</div>
@enderror
 </div>
 <div class="mb-3">
 <label class="form-label">Class</label>
 <input type="text" name="class_name" value="{{ old('class_name') }}"
 class="form-control @error('class_name') is-invalid @enderror">
@error('class_name')
 <div class="invalid-feedback">{{ $message }}</div>
@enderror
 </div>
  <div class="mb-3"> 
        <label class="form-label">Photo</label> 
        <input type="file" name="photo_path" class="form-control @error('photo_path') is-invalid @enderror"> 
        @error('photo_path') 
            <div class="invalid-feedback">{{ $message }}</div> 
        @enderror 
 </div> 
 <button class="btn btn-primary">Save</button>
</form>

@endsection