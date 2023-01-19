@extends('layouts.main')

@section('title', 'Add Class')

@section('content')

    <div class="mt-5 col-8 m-auto">
        <form action="class" method="post">
            @csrf
            <div class="my-3">
                <input placeholder="input class name" type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="my-3">
                <select class="form-control" name="teacher_id" id="teacher">
                    <option value="">Select Techer</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach
                </select>

                <div class="mt-3">
                    <button class="btn btn-success">Save</button>
                </div>
            </div>
        </form>
    </div>

@endsection
