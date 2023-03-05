<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\City;
use App\Exports\CityExport;
use App\Imports\CityImport;
use Illuminate\Http\Request;
use App\Exports\CityFormExport;
use Maatwebsite\Excel\Facades\Excel;

class CityController extends Controller
{

    public function index()
    {
        $cities = City::all();
        return view('city.city', ['cities' => $cities]);
    }

    public function inde2()
    {
        $cities = City::all();
        return view('city.invoice', ['cities' => $cities]);
    }
    // public function exportcity(Request $request)
    public function exportcity()
    {
        // return Excel::download(new CityExport, 'city-' . Carbon::now()->timestamp . '.xlsx');
        // return (new CityExport($request->country_id))->download('city-' . Carbon::now()->timestamp . '.xlsx');
        return (new CityExport)->download('city-' . Carbon::now()->timestamp . '.xlsx');
    }
    public function exportcity2()
    {
        return (new CityFormExport)->download('city-' . Carbon::now()->timestamp . '.xlsx');
    }

    public function importcity(Request $request)
    {
        Excel::import(new CityImport, $request->file('file'));


        return redirect('/cities');
        // dd($request->file('file'));

    }
}
