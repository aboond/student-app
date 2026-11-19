<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('loginPage'); 

Route::post('/login', [AuthController::class, 'login'])->name('login'); 

Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 

Route::get('/hello', function () {
 return 'Hello from Laravel';
});


Route::get('/hello/{name}', function (string $name) {
 return "Hello, $name";
});


Route::resource('students', StudentController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/students/delete/{id}',[StudentController::class, 'delete'])->name('students.delete');

Route::resource('guardian', GuardianController::class);

Route::get('/studentslive', fn () => view('students.live'));
