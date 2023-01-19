@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <h1>Ini adalah halaman home</h1>
    <p>Selamat Datang {{ Auth::user()->name }} , Anda adalah {{ Auth::user()->role->name }}</p>

@endsection
