<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // method untuk menampikan halaman student
    public function index(){
        // mendapatkan data student dari database
        $students = Student::all();


        // panggil view dan kirim data view
        return view('admin.contents.student.index', [
            'students' => $students
        ]);
    }
        
    // Method untuk menampilkan form tambah student
    public function create() 
    {
        // Dapatkan data courses dari database
        $courses = Courses::all();
        return view('admin.contents.student.create',[
            'courses' => $courses
        ]);

    }

    // Method untuk menyimpan data student
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
            'course_id' => 'nullable|numeric',
        ]);

        // simpan ke database
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
            'course_id' => $request->course_id,
        ]);

        // Arahkan ke halaman student index
        return redirect('/admin/student')->with('pesan', 'Berhasil menambahkan data.');
    }

    // Method untuk menampilkan halaman edit
    public function edit($id){
        //cari student berdasarkan id
        $student = Student::find($id); // SELECT * FROM students WHERE id = $id;

        // kirim student ke view edit
        return view('admin.contents.student.edit', [
            'student' => $student
        ]);
    }

    // Method untuk menyimpan hasil update
    public function update ($id, Request $request){
        // cari data student berdasarkan id
        $student = Student::find($id); // SELECT * FROM students WHERE id = $id;

        // Validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
        ]);

        // simpan perubahan
        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
        ]);

        // kembalikan ke halaman student
        return redirect('/admin/student')->with('pesan', 'Berhasil mengedit student.');
    }

    // Method untuk menghapus student
    public function destroy($id){
        // cari data student berdasarkan id
        $student = Student::find($id); // SELECT * FROM students WHERE id = $id;

        // hapus student
        $student->delete();

        // kembalikan ke halaman student
        return redirect('/admin/student')->with('pesan', 'Berhasil mengedit student.');
    }
}

