@extends('layouts.main')

@section('title', 'Teachers')

@section('content')

    <div class="my-5">
        <a class="btn btn-primary" href="/teacher">Add Data</a>
    </div>

    <h3>Teacher List</h3>
    <table class="table table-bordered border-dark">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $teacher->name }}</td>
                    <td>
                        <a href="/teacher/{{ $teacher->id }}">detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
