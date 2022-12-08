<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Category;
use App\Models\ClassRoom;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Student::truncate();
        Schema::enableForeignKeyConstraints();

        $a = [
            'name' => 'Kuga Yuma',
            'age' => '17',
            'gender' => 'male',
            'nisn' => mt_rand(000000001, 999999999),
            'alamat' => 'Bogor',
            'class_id' => '1',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ];
        $b = [
            'name' => 'Yuichi Jin',
            'age' => '19',
            'gender' => 'male',
            'nisn' => mt_rand(000000001, 999999999),
            'alamat' => 'Depok',
            'class_id' => '2',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ];
        $c = [
            'name' => 'Yami',
            'age' => '28',
            'gender' => 'male',
            'nisn' => mt_rand(000000001, 999999999),
            'alamat' => 'Bekasi',
            'class_id' => '3',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ];

        $d = [
            'name' => 'Chika',
            'age' => '18',
            'gender' => 'Female',
            'nisn' => mt_rand(000000001, 999999999),
            'alamat' => 'Pluto',
            'class_id' => '4',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ];

        Student::insert([$a, $b, $c, $d]);

    }
}
