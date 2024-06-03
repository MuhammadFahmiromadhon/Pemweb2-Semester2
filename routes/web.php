<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

 Route::get('/', function () {
     return view('welcome');
 });

// // Route untuk menampilkan salam
// Route::get('/salam', function(){
//     return "Assalamualaikum";
// });

/**
 * Method HTTP:
 * 1. Get: digunakan untuk menampilkan data/halaman. 
 * 2. Post: digunakan untuk mengirim data (e.g: form data)
 * 3. put: digunakan untuk meng-update data
 * 4. Delete: digunakan untuk menghapus data
 */

// Dashboard Route
Route::get('admin/dashboard', [DashboardController::class, 'index']);

//Route untuk menampilkan student
Route::get('admin/student', [StudentController::class, 'index']);

// Route untuk menampilkan courses
Route::get('admin/courses', [CoursesController::class, 'index']);

// Route untuk menampilkan form tambah student
Route::get('admin/student/create', [StudentController::class, 'create']);

// Route untuk mengirim data form tambah student
Route::post('admin/student/create', [StudentController::class, 'store']);

// Route untuk menampilkan halaman edit student
Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);

// Route untuk menyimpan hasil update student
Route::put('admin/student/update/{id}', [StudentController::class, 'update']);

// Route untuk menhapus student
Route::delete('admin/student/delete/{id}', [StudentController::class, 'destroy']);

// Route untuk menampilkan form tambah courses
Route::get('admin/courses/create', [CoursesController::class, 'create']);

// Route untuk mengirim data courses baru
Route::post('admin/courses/store', [CoursesController::class, 'store']);

// Route untuk menampilkan halaman edit courses
Route::get('admin/courses/edit/{id}', [CoursesController::class, 'edit']);

// Route untuk menyimpan hasil update courses
Route::put('admin/courses/update/{id}', [CoursesController::class, 'update']);

// Route untuk menhapus courses
Route::delete('admin/courses/delete/{id}', [CoursesController::class, 'destroy']);