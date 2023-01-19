@extends('layouts.main')

@section('title', 'ClassRooms')

@section('content')

    <div class="my-5">
        <a class="btn btn-primary" href="">Add Data</a>
    </div>

    <h5>Class Room</h5>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Class</th>
                {{-- <th>Teacher</th> --}}
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classrooms as $classroom)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $classroom->name }}
                    </td>
                    {{-- <td>
                        {{ $classroom->teachers->name }}
                    </td> --}}
                    <td>
                        <a href="/class/{{ $classroom->id }}">detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
