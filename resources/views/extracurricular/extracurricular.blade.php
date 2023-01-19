@extends('layouts.main')

@section('title', 'Students')

@section('content')

    <div class="my-5">
        <a class="btn btn-primary" href="/extracurricular">Add Data</a>
    </div>

    <h3>Extracurricular</h3>
    <table class="table table-bordered border-dark">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($extracurriculars as $extracurricular)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $extracurricular->name }}</td>
                    <td>
                        <a href="/extracurricular/{{ $extracurricular->id }}">detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
