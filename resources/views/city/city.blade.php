@extends('layouts.main')

@section('title', 'City List')

@section('content')
    <div class="container">

        <form action="/city-import" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" id="">
            <button type="submit">Submit</button>
        </form>

        <table class="table table-bordered border-dark">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Country</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cities as $city)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $city->name }}</td>
                        <td>{{ $city->country->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/city-export">Export</a>
        <a href="/city-export-fv">Export Form View</a>
        {{-- <a href="/city-export/4">Export</a> --}}
    </div>
@endsection
