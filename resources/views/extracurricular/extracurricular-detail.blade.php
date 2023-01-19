@extends('layouts.main')

@section('title', 'Students')

@section('content')
    <div class="mt-3">
        <h3>anda sedang melihat extracurricular {{ $extracurricular->name }}</h3>
        <h4>List student student yang mengikuti extracurricular</h4>
        <ol>
            @foreach ($extracurricular->students as $student)
                <li>{{ $student->name }}</li>
            @endforeach
        </ol>
    </div>
@endsection
