<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // ClassRoom::truncate();
        // Schema::enableForeignKeyConstraints();

        // $data = [
        //     ['name' => 'Mengaji'],
        //     ['name' => 'Membaca'],
        //     ['name' => 'Berak'],
        //     ['name' => 'Mandi'],
        //     ['name' => 'Kencing'],
        //     ['name' => 'Tidur'],
        // ];

        // foreach ($data as $value) {
        //     # code...
        //     ClassRoom::insert([
        //         'name' => $value['name'],
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ]);
        // }
    }
}
