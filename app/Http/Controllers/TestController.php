<?php

namespace App\Http\Controllers;

use App\Models\Uuid;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {

        $uuid = Uuid::get();
        return view('test.test', ['uuid' => $uuid]);
    }
    public function show($id)
    {
        $uuid = Uuid::findOrFail($id);
        return view('test.detail', ['uuid' => $uuid]);
    }
}
