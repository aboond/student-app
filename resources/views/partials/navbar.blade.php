<nav class="navbar navbar-dark bg-dark px-3">
    @auth 
        <span class="text-white me-3">Hello, {{ Auth::user()->name }}</span> 
        <form action="{{ route('logout') }}" method="POST" class="d-inline"> 
        @csrf 
        <button class="btn btn-sm btn-outline-light">Logout</button> 
        </form> 
@endauth 
 <a class="navbar-brand" href="{{ route('dashboard') }}">Student System</a>
 <a class="nav-link text-white" href="{{ route('students.index') }}">Students</a>
  <a class="nav-link text-white" href="{{ route('guardian.index') }}">Guardian</a>
</nav> 