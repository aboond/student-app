@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Students</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
</div>


<form action="{{route('students.index')}}" method="GET">
    <input type="text" name="q" placehoder="search students">
    <button type="submit">search</button>
</form>

<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Class</th>
        <th>Photo</th>
        <th>Action</th>
    </tr>
    @foreach ($students as $s)
    <tr>
        <td>{{ $s->name }} ({{ $s->guardians_count }} guardians)</td>
        <td>{{ $s->email }}</td>
        <td>{{ $s->class_name }}</td>
        <td>
            @if ($s->photo_path)
            <img src="{{ asset('storage/' . $s->photo_path) }}"
                alt="{{ $s->name }}" width="80" class="rounded">
            @else
            <span class="text-muted">No photo</span>
            @endif
        </td>
        <td>
             @can('edit students')<a href="{{ route('students.edit', $s->id) }}">Edit</a>@endcan
             @can('delete students')<a href="{{ route('students.delete', $s->id) }}">Delete</a>@endcan
        </td>
    </tr>
    @endforeach
</table>
{{ $students->links() }}
@endsection