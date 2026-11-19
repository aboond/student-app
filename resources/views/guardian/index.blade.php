@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
 <h1>Guardian</h1>
 <a href="{{ route('guardian.create') }}" class="btn btn-primary">Add Guardian</a>
</div>


<form action="{{route('guardian.index')}}" method="GET">
    <input type="text" name="q" placehoder="search guardian">
    <button type="submit">search</button>
</form>

<table class="table table-bordered">
 <tr><th>Name</th><th>Relationship</th><th></th></tr>
 @foreach ($guardian as $s)
 <tr>
 <td>{{ $s->name }}</td>
 <td>{{ $s->relationship }}</td>
 <td>{{ $s->phone }}</td>
 <td><a href="{{ route('guardian.edit', $s->id) }}">Edit</a></td>
 </tr>
 @endforeach
</table>
@endsection 