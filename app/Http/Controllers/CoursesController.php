<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    // method untuk menampikan halaman student
    public function index(){
        // mendapatkan data courses dari database
        $courses = courses::all();

        // panggil view dan kirim data view
        return view('admin.contents.courses.index', [
            'courses' => $courses
        ]);
    }
}
