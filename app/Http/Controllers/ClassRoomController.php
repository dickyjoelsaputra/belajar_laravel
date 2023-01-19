<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Teacher;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    public function index()
    {

        // lazy load
        // $classrooms = ClassRoom::all();
        // select * from table class
        // select * from student where class = 1A
        // select * from student where class = 1B
        // select * from student where class = 1C
        // select * from student where class = 1D
        // select * from student where class = 1E


        // eager load
        // $classrooms = ClassRoom::with('students')->get();
        // select * from table class
        // select * from student where class in (1A,1B,1C,1D)
        $classrooms = ClassRoom::with('teachers')->get();

        $classrooms = ClassRoom::get();
        return view('classroom.classroom', ['classrooms' => $classrooms]);
    }

    public function show($id)
    {
        // $student = Student::find($id);
        $classroom = ClassRoom::with(['students', 'teachers'])->findOrFail($id);
        return view('classroom.class-detail', ['classroom' => $classroom]);
    }

    public function create()
    {
        // $student = Student::find($id);
        // $classroom = ClassRoom::with(['students', 'teachers'])->findOrFail($id);
        $teachers = Teacher::select('id', 'name')->get();
        return view('classroom.class-add', ['teachers' => $teachers]);
    }
    public function store(Request $request)
    {
        $class = ClassRoom::create($request->all());

        return redirect('/classes');
    }
}
