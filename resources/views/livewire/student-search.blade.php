<div> <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search students..." class="form-control mb-3">
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Class</th>
        </tr> @forelse ($students as $student) <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->class_name }}</td>
        </tr> @empty <tr>
            <td colspan="2">No students found.</td>
        </tr> @endforelse
    </table> {{ $students->links() }}
</div>