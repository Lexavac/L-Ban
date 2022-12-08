<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        Category::truncate();


        $a = [
            'name' => 'Tomura1',
            'category_id' => '7',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ];

        $b = [
            'name' => 'Tomura2',
            'category_id' => '8',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ];

        $c = [
            'name' => 'Tomura3',
            'category_id' => '9',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ];
        $d = [
            'name' => 'Tomura4',
            'category_id' => '10',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ];

        $e = [
            'name' => 'Tomura5',
            'category_id' => '11',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ];

        $f = [
            'name' => 'Tomura6',
            'category_id' => '12',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ];

        $g = [
            'name' => 'Tomura7',
            'category_id' => '13',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ];

        Category::insert([$a, $b, $c, $d, $e, $f, $g]);
        Schema::enableForeignKeyConstraints();




    }
}
