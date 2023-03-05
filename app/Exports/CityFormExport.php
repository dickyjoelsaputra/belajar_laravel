<?php

namespace App\Exports;

use App\Models\City;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class CityFormExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     return City::all();
    // }
    use Exportable;

    public function view(): View
    {
        return view('city.invoice', [
            // 'cities' => City::all()
            'cities' => City::all()->where('country_id', 4)
        ]);
    }
}
