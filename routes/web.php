<?php

use App\Http\Controllers\DashboardController;
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
 */

// Dashboard Route
Route::get('admin/dashboard', [DashboardController::class, 'index']);