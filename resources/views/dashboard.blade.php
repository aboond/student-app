@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<h1 class="mb-4">Dashboard</h1>
<div class="row mb-4">
 <div class="col-md-6">
 <div class="card text-center"><div class="card-body">
 <h2>{{ $stats['students'] }}</h2><p>Total students</p>
 </div></div>
 </div>
 <div class="col-md-6">
 <div class="card text-center"><div class="card-body">
 <h2>{{ $stats['classes'] }}</h2><p>Classes</p>
 </div></div>
 </div> 

 </div>
<h4>Recently added</h4>
<ul>
 @forelse ($recent as $name)
 <li>{{ $name }}</li>
 @empty
 <li>No students yet.</li>
 @endforelse
</ul>
@endsection
