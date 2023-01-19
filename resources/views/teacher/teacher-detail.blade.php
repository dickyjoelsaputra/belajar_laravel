@extends('layouts.main')

@section('title', 'Teacher')

@section('content')

    <h3>Nama Teacher : {{ $teacher->name }}</h3>

    <h3>Nama kelas :

        @if ($teacher->class)
            {{ $teacher->class->name }}
        @else
            -
        @endif
    </h3>

    <h3>List Student :</h3>
    @if ($teacher->class->students)
        <ol>
            @foreach ($teacher->class->students as $student)
                <li>{{ $student->name }}</li>
            @endforeach
        </ol>
    @endif

@endsection
