<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eskul = Extracurricular::get();
        return view('extracurricular.extracurricular', ['extracurriculars' => $eskul]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('extracurricular.extracurricular-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $extracurricular = Extracurricular::create($request->all());

        return redirect('/extracurriculars');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eskul = Extracurricular::with('students')->findOrFail($id);
        // $eskul = Extracurricular::get();
        // dd($eskuls);
        return view('extracurricular.extracurricular-detail', ['extracurricular' => $eskul]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function edit(Extracurricular $extracurricular)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Extracurricular $extracurricular)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Extracurricular  $extracurricular
     * @return \Illuminate\Http\Response
     */
    public function destroy(Extracurricular $extracurricular)
    {
        //
    }
}
