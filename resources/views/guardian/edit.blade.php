@extends('layouts.app')

@section('content')
<h1>Edit Student</h1>

<form action="{{ route('guardian.update', $student->id) }}" method="POST">
 @csrf
 @method('PUT') 
 <div class="mb-3">
 <label class="form-label">Name</label>
 <input type="text" name="name" class="form-control"
 value="{{ old('name', $student->name ?? '') }}">
 </div>
 <div class="mb-3">
 <label class="form-label">Relationship</label>
 <input type="relationship" name="relationship" class="form-control"
 value="{{ old('relationship', $student->relationship ?? '') }}">
 </div>
 <div class="mb-3">
 <label class="form-label">Phone</label>
 <input type="text" name="phone" class="form-control"
 value="{{ old('phone', $student->phone ?? '') }}">
 </div>
 <button class="btn btn-primary">Save</button>


</form>

@endsection