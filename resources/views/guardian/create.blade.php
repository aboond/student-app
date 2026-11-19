@extends('layouts.app')

@section('content')
<h1>Add Guardian</h1>
<form action="{{ route('guardian.store') }}" method="POST">
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
 <label class="form-label">Relationship</label>
 <input type="text" name="relationship" value="{{ old('relationship') }}"
 class="form-control @error('relationship') is-invalid @enderror">
@error('relationship')
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
 
 <button class="btn btn-primary">Save</button>
</form>

@endsection