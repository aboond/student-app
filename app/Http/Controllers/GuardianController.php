<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Guardian;
use App\Models\Students;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
        {
        $students = DB::table('students')->get();
        $guardian = Guardian::latest()->get();
        return view('guardian.index', compact('guardian','students'));
        }


         public function create()
        {
        return view('guardian.create');
        }


      


    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => ['required', 'string', 'max:5'],
        'relationship' => ['required'],
        'phone' => ['nullable', 'regex:/^[0-9+\-\s]{8,15}$/'],
     
        ]);
        DB::table('guardians')->insert($validated + [
        'created_at' => now(),
        'updated_at' => now(),
        ]);
        return redirect()->route('guardian.index')->with('success', 'Guardian added.');
    } 
        public function edit(Guardian $guardian)
        {
        return view('guardian.edit', compact('guardian'));
        }


        public function update(UpdateStudentRequest $request, Guardian $guardian)
        {
        $guardian->update($request->validated());
        return redirect()->route('guardian.index')->with('success', 'Guardian updated.');
        }


        public function destroy(Guardian $student)
        {
        $student->delete();
        return redirect()->route('guardian.index')->with('success', 'Guardian deleted.');
        }
}
