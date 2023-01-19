@extends('layouts.main')

@section('title', 'Students')

@section('content')

@auth
    
@endauth

    <div class="my-5 d-flex justify-content-between">
        <a class="btn btn-primary" href="/student-add">Add Data</a>
        <a class="btn btn-info" href="/student-deleted">Show Deleted Data</a>
    </div>

    {{ $students->withQueryString()->links() }}

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <h3>Student List</h3>

    <div class="my-3 col-12 col-sm-8 col-md-5">
        <form action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="searchstudent" placeholder="Search Student"
                    aria-label="Server">
                <button class="input-group-text btn btn-primary">Search</button>
            </div>
        </form>
    </div>

    <table class="table table-bordered border-dark">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Gender</th>
                <th>NIM</th>
                <th>Class</th>
                {{-- <th>Teacher</th> --}}
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->nim }}</td>
                    <td>{{ $student->class->name }}</td>
                    {{-- <td>{{ $student->class->teachers->name }}</td> --}}
                    <td>
                        <a href="/student/{{ $student->id }}">detail</a>
                        <a href="/student-edit/{{ $student->id }}">edit</a>
                        <form action="/student-delete/{{ $student->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav> --}}

    {{-- <div class="d-flex">
        {{ $students->links() }}
    </div> --}}

    {{ $students->withQueryString()->links() }}

@endsection
