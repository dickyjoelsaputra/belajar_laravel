<?php

namespace Database\Seeders;

use App\Models\Uuid;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UuidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Uuid::truncate();

        $data = ['tony', 'anya', 'berlin'];

        foreach ($data as $value) {
            Uuid::create([
                'id' => Str::uuid(),
                'name' => $value
            ]);
        }
    }
}
