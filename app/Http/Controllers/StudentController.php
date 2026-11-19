<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;
use App\Actions\CreateStudent;
use App\Http\Requests\StoreStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::withCount('guardians')->orderBy('name')->paginate(15);

        $q = request('q');


        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request, CreateStudent $action)
    {
        $action->execute($request->safe()->except('photo'), $request->file('photo'));
        return redirect()->route('students.index')->with('success', 'Student added.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "Student detail: $id";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = DB::table('students')->where('id', $id)->first();
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::where('id', $id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'class_name' => $request->input('class_name'),
            'photo_path' => $request->input('photo_path'),
            'updated_at' => now(),
        ]);

        if ($request->hasFile('photo')) {
            if ($student->photo_path) {
                Storage::disk('public')->delete($student->photo_path);
            }
            $data['photo_path'] = $request->file('photo')->store('students', 'public');
        }
        unset($data['photo']);
        // in destroy(), before $student->delete() 
        if ($student->photo_path) {
            Storage::disk('public')->delete($student->photo_path);
        }
        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        // echo 1;exit;
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted.');
    }
}
