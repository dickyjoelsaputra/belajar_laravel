<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::get();
        return view('teacher.teacher', ['teachers' => $teachers]);
    }

    public function show($id)
    {
        $teacher = Teacher::with('class.students')->findOrFail($id);
        return view('teacher.teacher-detail', ['teacher' => $teacher]);
    }

    public function create()
    {
        return view('teacher.teacher-add');
    }
    public function store(Request $request)
    {
        $teacher = Teacher::create($request->all());

        return redirect('/teachers');
    }
}
