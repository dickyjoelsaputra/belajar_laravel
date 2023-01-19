@extends('layouts.main')

@section('title', 'Trashed Students')

@section('content')

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <h3>Student List Deleted</h3>
    <table class="table table-bordered border-dark">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Gender</th>
                <th>NIM</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trashedStudent as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->nim }}</td>
                    <td class="d-flex justify-content-between">
                        <a href="/student/{{ $student->id }}/restore">Restore</a>
                        <a href="/student/{{ $student->id }}/forcedelete">Force Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
