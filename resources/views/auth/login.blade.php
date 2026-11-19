@extends('layouts.app')

@section('content')
<h1>Login</h1>
<form action="{{ route('login') }}" method="POST">
 @csrf
 <div class="mb-3">
 <label class="form-label">Username</label>
 <input class="form-control" name="email">
 </div>
 <div class="mb-3">
 <label class="form-label">Password</label>
 <input type="text" name="password" class="form-control">
 </div>
 <button class="btn btn-primary">Login</button>
</form>

@endsection