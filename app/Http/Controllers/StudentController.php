<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use App\Models\Extracurricular;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Session\Session;
use App\Http\Requests\StudentCreateRequest;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    public function index(Request $request)
    {

        // Query Builder
        //get data ============
        // $students = DB::table('students')->get();
        //insert data ============
        // DB::table('students')->insert([
        //     'name' => 'titid',
        //     'gender' => 'P',
        //     'nim' => '1234542',
        //     'class_id' => 1
        // ]);
        //edit data =============
        // DB::table('students')->where('id', 15)->update([
        //     'name' => 'query builder'
        // ]);
        //delete data =============
        // DB::table('students')->where('id', 18)->delete();

        // elequent builder
        //get data ============
        // $students = Student::all();
        //insert data ============
        // Student::create([
        //     'name' => 'titid2',
        //     'gender' => 'P',
        //     'nim' => '1234542',
        //     'class_id' => 1
        // ]);
        //edit data =============
        // Student::find(16)->update([
        //     'name' => 'update eleqoent 2',
        //     'class_id' => 3
        // ]);
        //delete data =============
        // Student::find(19)->delete();


        // collection method
        // $nilai = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 20];
        // php biasa
        // 1. hitung jumlah nilai
        // 2. hitung berapa banyak nilai
        // 3. hitung nilai rata rata = total nilai / count nilai
        // $countNilai = count($nilai);
        // $totalNilai = array_sum($nilai);
        // $nilaiRataRata = $totalNilai / $countNilai;

        // collection
        // 1. hitung nilai rata rata

        //rata-rata / average
        // $nilaiRataRata = collect($nilai)->avg();
        // contains = apakah ada nilai tertentu;
        // $a = collect($nilai)->contains(function ($value) {
        //     return $value < 6;
        // });
        // dd($a);

        // diff
        // $restaurantA = ["burger", "siomay", "pizza", "spaghetti", "makaroni", "martabak", "bakso"];
        // $restaurantb = [
        //     "pizza", "fried chiken", "martabak", "sayur asem", "pecel lele", "bakso"
        // ];

        // $menuRestoranA = collect($restaurantA)->diff($restaurantb);

        // dd($menuRestoranA);


        //filter = menyaring
        // $nilai = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 20];

        // $aaa = collect($nilai)->filter(function ($value) {
        //     return $value > 7;
        // })->all();

        // dd($aaa);

        // pluck = mencari array tertentu
        // $biodata = [
        //     ['nama' => 'budi', 'umur' => 17],
        //     ['nama' => 'ani', 'umur' => 12],
        //     ['nama' => 'yono', 'umur' => 13],
        //     ['nama' => 'dasa', 'umur' => 11],
        //     ['nama' => 'doso', 'umur' => 14],
        // ];


        // $aaa = collect($biodata)->pluck('nama');
        // dd($aaa);

        //map
        // $nilai = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 20];
        // $aaa = collect($nilai)->map(function ($value) {
        //     return $value * 2;
        // })->all();

        // -> all() , untuk menampilkan datanya saja

        // dd($aaa);

        // $students = Student::all()
        // $students = Student::with('class')->all();
        //  multipler relation
        // $students = Student::with(['class', 'extracurriculars'])->get();
        // $students = Student::get();
        // $students = Student::with('class.teachers')->get();


        // memunculkan soft delete
        // $students = Student::withTrashed()->get();
        // pagination

        // fitur search
        $searchstudent = $request->searchstudent;


        $students = Student::orderByDesc('created_at')->where('name', 'LIKE', '%' . $searchstudent . '%')
            ->orWhere('gender', $searchstudent)
            ->orWhere('nim', 'LIKE', '%' . $searchstudent . '%')
            ->orWhereHas('class', function ($query) use ($searchstudent) {
                $query->where('name', 'LIKE', '%' . $searchstudent . '%');
            })
            ->paginate(15);


        // $students = Student::paginate(15);
        // $students = Student::simplePaginate(15);
        return view('student.student', ['students' => $students]);
    }

    public function show($slug)
    {
        // $student = Student::find($id);
        // $student = Student::with(['class.teachers', 'extracurriculars'])->findOrFail($id);

        $student = Student::with(['class.teachers', 'extracurriculars'])->where('slug', $slug)->first();
        return view('student.student-detail', ['student' => $student]);
    }

    public function create()
    {
        // $class = ClassRoom::get();
        $eskul = Extracurricular::get();
        $class = ClassRoom::select('id', 'name')->get();
        return view('student.student-add', ['classroom' => $class, 'extracurriculars' => $eskul]);
    }

    public function store(StudentCreateRequest $request)
    {
        // $student = new Student;
        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->nim = $request->nim;
        // $student->class_id = $request->class_id;
        // $student->save();
        // $validated = $request->validate([

        // $request->validate([
        //     'nim' => 'unique:students|max:10',
        //     'name' => 'max:10|required',
        //     'gender' => 'required',
        //     'class_id' => 'required'
        // ]);




        // retrive gambar
        // return $request->file('photo')->store('photos');

        // dd($request->extracurricular_id);
        // dd($request['extracurricular_id']);
        $newName = '';
        if ($request->file('photo')) {
            // memberi nama spesifik kepada gambar , method store as
            $extension = $request->file('photo')->getClientOriginalExtension();
            // $newName = $request->name . '.' . $extension;
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('photos', $newName);
        }

        $request['image'] = $newName;
        // $request['slug'] = Str::slug($request->name, '_');
        $student = Student::create($request->only(['name', 'nim', 'gender', 'class_id', 'image']));
        $student->extracurriculars()->attach($request->extracurricular_id);

        // foreach ($request->extracurricular_id as $data) {
        //     # code...
        // }

        if ($student) {
            session()->flash('status', 'success');
            session()->flash('message', 'Added student successful!');
        }

        return redirect('/students');
    }

    public function edit(Request $request, $id)
    {
        $class = ClassRoom::select('id', 'name')->get();
        $extracurricular = Extracurricular::select('id', 'name')->get();
        $student = Student::with(['class', 'extracurriculars'])->findOrFail($id);
        return view('student.student-edit', ['student' => $student, 'classroom' => $class, 'extracurricular' => $extracurricular]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->nim = $request->nim;
        // $student->class_id = $request->class_id;

        // $request->save();
        $newName = '';
        if ($request->file('photo')) {
            // memberi nama spesifik kepada gambar , method store as
            $extension = $request->file('photo')->getClientOriginalExtension();
            // $newName = $request->name . '.' . $extension;
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('photos', $newName);

            // delete exiting image
            if (Storage::exists('photos/' . $student->image)) {
                Storage::delete('photos/' . $student->image);
                /*
                Delete Multiple File like this way
                Storage::delete(['upload/test.png', 'upload/test2.png']);
            */
            }
        } else {
            $newName = $student->image;
        }

        $request['image'] = $newName;
        // $request['slug'] = Str::slug($request->name, '_');
        $student->update($request->only(['name', 'nim', 'gender', 'class_id', 'image']));
        $student->extracurriculars()->sync($request->extracurricular_id);
        // $student->update($request->all());

        return redirect('/students');
    }

    public function destroy($id)
    {
        // $deleteStudent = DB::table('students')->where('id', $id)->delete();
        $deleteStudent = Student::findOrFail($id);
        $deleteStudent->delete();


        if ($deleteStudent) {
            session()->flash('status', 'success');
            session()->flash('message', 'Student Deleted');
        }
        return redirect('/students');
    }

    public function deletedStudent()
    {
        $trashedStudent = Student::onlyTrashed()->get();
        return view('student.student-deleted-list', ['trashedStudent' => $trashedStudent]);
    }

    public function restoreStudent($id)
    {
        $deletedStudent = Student::withTrashed()->where('id', $id)->restore();
        if ($deletedStudent) {
            session()->flash('status', 'success');
            session()->flash('message', 'Student Restored Success');
        }
        return redirect('/students');
    }

    public function forceDeleteStudent($id)
    {
        // $deletedStudent = Student::withTrashed()->where('id', $id);
        $student = Student::withTrashed()->findOrFail($id);
        if (Storage::exists('photos/' . $student->image)) {
            Storage::delete('photos/' . $student->image);
            /*
                Delete Multiple File like this way
                Storage::delete(['upload/test.png', 'upload/test2.png']);
            */
        }

        // dd($deletedStudent);
        // dd($student->image);
        $student->extracurriculars()->detach();
        $student->forceDelete();

        if ($student) {
            session()->flash('status', 'success');
            session()->flash('message', 'Student Permaent Delete Success');
        }
        return redirect('/student-deleted');
    }

    // public function massupdate()
    // {
    //     $collection = collect(Student::all());
    // $collection = collect(Student::whereNull('slug')->get());
    //     $collection->map(function ($item) {
    //         $item->slug = Str::slug($item->name, '_');
    //         $item->save();
    //     });
    // }
}
