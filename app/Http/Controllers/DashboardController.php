<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
   public function index()
        {
            $stats = Cache::remember('dashboard.stats', 600, function () { 
return [ 
'students' => Student::count(), 
'classes'  => Student::distinct('class_name')->count('class_name'), 
]; 
}); 
            $recent = ['Aisyah', 'Daniel', 'Mei Ling'];
            return view('dashboard', compact('stats', 'recent'));
        } 

}
