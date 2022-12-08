<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Teacher::truncate();


        // $a = [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'Tomura1',
        //     'alamat' => 'Pluto',
        //     'umur' => '18',
        //     'kode_mapel' => '14',
        //     'walikelas' => 'PPLG 27',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];
        // $b = [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'Tomura2',
        //     'alamat' => 'Pluto2',
        //     'umur' => '18',
        //     'kode_mapel' => '15',
        //     'walikelas' => 'PPLG 23',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];
        // $c = [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'Ame',
        //     'alamat' => 'Tokyo',
        //     'umur' => '19',
        //     'kode_mapel' => '14',
        //     'walikelas' => 'PPLG 94',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];
        // $d = [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'Lexa',
        //     'alamat' => 'bekasi',
        //     'umur' => '18',
        //     'kode_mapel' => '14',
        //     'walikelas' => 'PPLG 14',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];
        // $e = [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'ryuuji',
        //     'alamat' => 'Pluto',
        //     'umur' => '18',
        //     'kode_mapel' => '16',
        //     'walikelas' => 'PPLG 92',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];
        // $f = [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'Kuga',
        //     'alamat' => 'Alcatraz',
        //     'umur' => '18',
        //     'kode_mapel' => '14',
        //     'walikelas' => 'PPLG 26',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];
        // $g = [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'Maki',
        //     'alamat' => 'Moon',
        //     'umur' => '18',
        //     'kode_mapel' => '14',
        //     'walikelas' => 'PPLG 922',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];
        // $h= [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'Makima',
        //     'alamat' => 'akihabara',
        //     'umur' => '18',
        //     'kode_mapel' => '16',
        //     'walikelas' => 'PPLG 72',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];
        // $i = [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'Denji',
        //     'alamat' => 'Tokyo',
        //     'umur' => '19',
        //     'kode_mapel' => '19',
        //     'walikelas' => 'PPLG 63',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];
        // $j = [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'Nomu',
        //     'alamat' => 'UA',
        //     'umur' => '19',
        //     'kode_mapel' => '24',
        //     'walikelas' => 'MM 24',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];
        // $k = [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'Shinra',
        //     'alamat' => 'Nagasaki',
        //     'umur' => '19',
        //     'kode_mapel' => '18',
        //     'walikelas' => 'MM 33',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];
        // $l = [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'Arthur',
        //     'alamat' => 'Indura',
        //     'umur' => '18',
        //     'kode_mapel' => '18',
        //     'walikelas' => 'PPLG 81',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];
        // $m = [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'Arthur',
        //     'alamat' => 'Boyle',
        //     'umur' => '18',
        //     'kode_mapel' => '123',
        //     'walikelas' => 'PPLG 64',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];
        // $n = [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'Osamu',
        //     'alamat' => 'Uk',
        //     'umur' => '18',
        //     'kode_mapel' => '144',
        //     'walikelas' => 'PPLG 43',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];
        // $o = [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'Yuuma',
        //     'alamat' => 'Pluto',
        //     'umur' => '18',
        //     'kode_mapel' => '14',
        //     'walikelas' => 'PPLG 32',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];
        // $p = [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'Yuda',
        //     'alamat' => 'Pluto 5',
        //     'umur' => '18',
        //     'kode_mapel' => '14',
        //     'walikelas' => 'PPLG 28',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];
        // $q = [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'Midoriya',
        //     'alamat' => 'Pluto8',
        //     'umur' => '18',
        //     'kode_mapel' => '14',
        //     'walikelas' => 'PPLG 22',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];
        // $r = [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'Bakugo',
        //     'alamat' => 'Hiroshima',
        //     'umur' => '19',
        //     'kode_mapel' => '15',
        //     'walikelas' => 'PPLG 12',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];
        // $s = [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'Aman',
        //     'alamat' => 'Bogor',
        //     'umur' => '15',
        //     'kode_mapel' => '19',
        //     'walikelas' => 'PPLG 5',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];
        // $t = [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'Yaku',
        //     'alamat' => 'Jupiter',
        //     'umur' => '17',
        //     'kode_mapel' => '18',
        //     'walikelas' => 'MM 9',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];
        // $u = [
        //     'nik' =>  mt_rand(000000001, 999999999),
        //     'name' => 'Yakuni',
        //     'alamat' => 'Mercurius',
        //     'umur' => '18',
        //     'kode_mapel' => '19',
        //     'walikelas' => 'MM 10',
        //     'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        // ];


        // Teacher::insert([$a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s, $t, $u]);
        Schema::enableForeignKeyConstraints();

        Teacher::factory()
        ->count(27)
        ->create();
    }
}
