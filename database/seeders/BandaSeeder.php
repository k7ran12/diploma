<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BandaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bandas')->insert([
            'nombre_banda' => '160M'
        ]);
        DB::table('bandas')->insert([
            'nombre_banda' => '80M'
        ]);
        DB::table('bandas')->insert([
            'nombre_banda' => '40M'
        ]);
        DB::table('bandas')->insert([
            'nombre_banda' => '30M'
        ]);
        DB::table('bandas')->insert([
            'nombre_banda' => '20M'
        ]);
        DB::table('bandas')->insert([
            'nombre_banda' => '17M'
        ]);
        DB::table('bandas')->insert([
            'nombre_banda' => '15M'
        ]);
        DB::table('bandas')->insert([
            'nombre_banda' => '12M'
        ]);
        DB::table('bandas')->insert([
            'nombre_banda' => '10M'
        ]);
        DB::table('bandas')->insert([
            'nombre_banda' => '6M'
        ]);
    }
}
