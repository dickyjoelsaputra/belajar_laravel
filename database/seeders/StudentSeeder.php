<?php

namespace Database\Seeders;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // Student::truncate();
        // Schema::enableForeignKeyConstraints();

        // $data = [
        //     [
        //         'name' => 'Dandan',
        //         'gender' => 'Wanita',
        //         'nim' => '112233',
        //         'class_id' => '1'
        //     ], [
        //         'name' => 'Jaka',
        //         'gender' => 'Pria',
        //         'nim' => '127895',
        //         'class_id' => '2'
        //     ], [
        //         'name' => 'Wawan',
        //         'gender' => 'Pria',
        //         'nim' => '129872',
        //         'class_id' => '4'
        //     ],

        // ];

        // foreach ($data as $value) {
        //     # code...
        //     Student::insert([
        //         'name' => $value['name'],
        //         'gender' => $value['gender'],
        //         'nim' => $value['nim'],
        //         'class_id' => $value['class_id'],
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ]);
        // }

        // Student::factory()->create();
        Student::factory()->count(100)->create();
    }
}
