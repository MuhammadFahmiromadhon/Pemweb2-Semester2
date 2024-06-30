@extends('admin.main')

@section('content')
<div class="pagetitle">
    <h1>Courses</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"></li>
        <li class="breadcrumb-item active">Courses</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
        <div class="card">
            <div class="card-body">
                @if(Auth::user()->role == 'administrator')
                    <a href="/admin/courses/create" class="btn btn-primary m-3">+ Courses</a>
                @endif
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            @if(Auth::user()->role == 'administrator')
                                <th>Action</th>
                            @endif
                        </tr>

                        @foreach ($courses as $courses)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $courses->name }}</td>
                                <td>{{ $courses->category }}</td>
                                <td>{{ $courses->desc }}</td>
                                @if(Auth::user()->role == 'administrator')
                                    <td class="d-flex">
                                        <a href="/admin/courses/edit/{{ $courses->id }}" class="btn btn-warning me-2">Edit</a>
                                        <form action="/admin/courses/delete/{{ $courses->id }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
  </section>
@endsection