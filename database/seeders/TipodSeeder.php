<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TipodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipod')->insert([
            'cod_tipod'=>'CC',
            'nom_tipod'=>'Cedula De Ciudadania'
        ]);

        DB::table('tipod')->insert([
            'cod_tipod'=>'CE',
            'nom_tipod'=>'Cedula De Extrangeria'
        ]);
        DB::table('tipod')->insert([
            'cod_tipod'=>'NIT',
            'nom_tipod'=>'NIT'
        ]);
        DB::table('tipod')->insert([
            'cod_tipod'=>'P',
            'nom_tipod'=>'Pasaporte'
        ]);
    }
}
