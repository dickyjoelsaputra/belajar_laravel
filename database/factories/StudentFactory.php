<?php

namespace Database\Factories;

use Faker;
// use Faker\Provider\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student::class>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = Faker\Factory::create();
        return [
            // menggunakan faker
            'name' => $faker->name(),
            // helper laravel
            'gender' => Arr::random(['L', 'P']),
            //menggunakan function php
            'nim' => mt_rand(0000001, 9999999),
            'class_id' => Arr::random([1, 2, 3, 4]),
        ];
    }
}
