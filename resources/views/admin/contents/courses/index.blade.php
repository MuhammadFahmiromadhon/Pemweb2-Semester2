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
                <a href="/courses/create" class="btn btn-primary m-3">+ Courses</a>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Desc</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($courses as $courses)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $courses->name }}</td>
                                <td>{{ $courses->category }}</td>
                                <td>{{ $courses->desc }}</td>
                                <td>
                                    <a href="#" class="btn btn-warning">Edit</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
  </section>
@endsection