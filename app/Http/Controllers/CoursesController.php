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

    // method untuk menampilkan form tambah courses
    public function create(){
        return view('admin.contents.courses.create');
    }

    // Method untuk menyimpan data courses baru
    public function store(Request $request)
    {
        // validasi request
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);

        // Simpan ke database
        Courses::create([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

         // kembalikan ke halaman courses
         return redirect('/admin/courses')->with('message', 'Berhasil menambahkan courses.');
    }

    // Method untuk menampilkan halaman edit
    public function edit($id){
        //cari student berdasarkan id
        $courses = Courses::find($id); // SELECT * FROM students WHERE id = $id;

        // kirim student ke view edit
        return view('admin.contents.courses.edit', [
            'courses' => $courses
        ]);
    }

    // Method untuk menyimpan hasil update
    public function update ($id, Request $request){
        // cari data student berdasarkan id
        $courses = Courses::find($id); // SELECT * FROM students WHERE id = $id;

        // Validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);

        // simpan perubahan
        $courses->update([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        // kembalikan ke halaman student
        return redirect('/admin/courses')->with('pesan', 'Berhasil mengedit courses.');
    }

    // Method untuk menghapus student
    public function destroy($id){
        // cari data student berdasarkan id
        $courses = Courses::find($id); // SELECT * FROM students WHERE id = $id;

        // hapus student
        $courses->delete();

        // kembalikan ke halaman student
        return redirect('/admin/courses')->with('pesan', 'Berhasil mengedit courses.');
    }
}
