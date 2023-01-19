@extends('layouts.main')

@section('title', 'Class-Detail')

@section('content')
    <h5>
        Teacher : {{ $classroom->teachers->name }}
    </h5>

    <h5>List Student</h5>
    <ol>
        @foreach ($classroom->students as $student)
            <li>{{ $student->name }}</li>
        @endforeach
    </ol>
@endsection
