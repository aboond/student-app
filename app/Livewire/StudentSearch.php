<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentSearch extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public string $search = '';
    public function updatingSearch(): void
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.student-search', ['students' => Student::where('name', 'like', "%{$this->search}%")->orderBy('name')->paginate(10),]);
    }
}
