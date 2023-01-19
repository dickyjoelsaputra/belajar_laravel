@extends('layouts.main')

@section('title', 'Add extracurricular')

@section('content')

    <div class="mt-5 col-8 m-auto">
        <form action="extracurricular" method="post">
            @csrf
            <div class="my-3">
                <input placeholder="input extracurricular name" type="text" class="form-control" name="name" id="name"
                    required>
            </div>

            <div class="mt-3">
                <button class="btn btn-success">Save</button>
            </div>
        </form>
    </div>

@endsection
