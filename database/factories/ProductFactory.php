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
class ProductFactory extends Factory
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
            'name' => $faker->randomElement(['Susu', 'Chitato', 'Fanta', 'Brownise']),
            'dec' => $faker->words(7, true),
            'stok' => mt_rand(001, 100),
            'distributor' => $faker->name(),
            'price' => mt_rand(000001, 999999),
            'cate_id' => Arr::random(['1', '2', '3', '4']),
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ];
    }
}
