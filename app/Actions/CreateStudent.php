<?php

namespace App\Actions;

use App\Events\StudentCreated;
use App\Models\Student;
use Illuminate\Http\UploadedFile;

class CreateStudent
{
    public function execute(array $data, ?UploadedFile $photo = null): Student
    {
        if ($photo) {
            $data['photo_path'] = $photo->store('students', 'public');
        }
        $student = Student::create($data);
        StudentCreated::dispatch($student);
        return $student;
    }
}
