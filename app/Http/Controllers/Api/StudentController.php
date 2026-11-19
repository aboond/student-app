<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Actions\CreateStudent;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return StudentResource::collection(
            Student::with('guardians')->latest()->paginate(10)
        );
    }

    public function store(StoreStudentRequest $request,  CreateStudent $action)
    {
        $student = $action->execute($request->safe()->except('photo'));
        return new StudentResource($student);
    }

    public function show(Student $student)
    {
        return new StudentResource($student->load('guardians'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->safe()->except('photo'));
        return new StudentResource($student);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return response()->noContent();
    }
}
