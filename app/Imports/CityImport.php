<?php

namespace App\Imports;

use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

// class CityImport implements ToModel, WithHeadingRow
class CityImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    // public function model(array $row)
    // {
    //     return new City([
    //         'name' => $row['name'],
    //         'country_id' => $row['country']
    //     ]);
    // }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $country = Country::where('name', $row['country'])->first();
            if ($country != null) {
                # code...
                City::create([
                    'name' => $row['name'],
                    'country_id' => $country['id']
                ]);
            } else {
                $countcreate = Country::create([
                    'name' => $row['country'],
                ]);
                City::create([
                    'name' => $row['name'],
                    'country_id' => $countcreate['id']
                ]);
            }
        }
    }
}
