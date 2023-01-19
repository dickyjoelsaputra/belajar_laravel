@extends('layouts.main')

@section('title', 'Student-Detail')

@section('content')


    <div class="my-3 d-flex justify-content-center">
        @if ($student->image != '')
            <img class="img-thumbnail" src="{{ asset('storage/photos/' . $student->image) }}" alt="" width="200px">
        @else
            <img class="img-thumbnail" src="{{ asset('images/default.png') }}" alt="" width="200px">
        @endif
    </div>

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Class</th>
                <th scope="col">Teacher</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>{{ $student->name }}</td>
                <td>
                    @if ($student->gender == 'P')
                        Perempuan
                    @else
                        Laki-Laki
                    @endif
                </td>
                <td>{{ $student->class->name }}</td>
                <td>{{ $student->class->teachers->name }}</td>
            </tr>
        </tbody>
    </table>

    <h3>extracurriculars</h3>

    <ol>
        @foreach ($student->extracurriculars as $extracurricular)
            <li>{{ $extracurricular->name }}</li>
        @endforeach
    </ol>

@endsection
