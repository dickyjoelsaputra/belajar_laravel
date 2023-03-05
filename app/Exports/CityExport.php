<?php

namespace App\Exports;

use App\Models\City;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

// class CityExport implements FromCollection
class CityExport implements FromQuery, WithMapping , WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */


    use Exportable;

    // public function __construct($country_id)
    // {
    //     $this->country_id = $country_id;
    // }

    public function query()
    {
        // return City::query()->where('country_id', $this->country_id);
        return City::query();
    }

    public function map($city): array
    {
        return [
            $city->name,
            $city->country->name,
        ];
    }

    public function headings(): array
    {
        return [
            'City',
            'Country',
        ];
    }
}
