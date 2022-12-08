<?php

namespace Database\Factories;

use App\Models\Teacher;
use Faker\Factory as palsu;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = palsu::create();

        return [
            'nik' => $faker->randomNumber(9, true),
            'name' => $faker->name(),
            'alamat' => $faker->address(),
            'gender' => $faker->randomElement(['L', 'P']),
            'umur' => $faker->numberBetween(0, 99),
            'kode_mapel' => $faker->numberBetween(0, 99),
            'walikelas' => $faker->numerify('PPLG-#######'),
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ];
    }
}
