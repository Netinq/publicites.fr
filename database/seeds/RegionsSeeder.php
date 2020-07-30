<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->firstOrCreate(['name' => 'Auvergne-Rhône-Alpes ','identifier' => 'auvergne-rhone-alpes']);
        DB::table('regions')->firstOrCreate(['name' => 'Bourgogne-Franche-Comté ','identifier' => 'bourgogne-franche-comte']);
        DB::table('regions')->firstOrCreate(['name' => 'Bretagne ','identifier' => 'bretagne']);
        DB::table('regions')->firstOrCreate(['name' => 'Centre-Val de Loire ','identifier' => 'centre-val-de-loire']);
        DB::table('regions')->firstOrCreate(['name' => 'Corse ','identifier' => 'corse']);
        DB::table('regions')->firstOrCreate(['name' => 'Grand Est ','identifier' => 'grand-est']);
        DB::table('regions')->firstOrCreate(['name' => 'Hauts-de-France ','identifier' => 'hauts-de-france']);
        DB::table('regions')->firstOrCreate(['name' => 'Ile-de-France ','identifier' => 'ile-de-france']);
        DB::table('regions')->firstOrCreate(['name' => 'Normandie ','identifier' => 'normandie']);
        DB::table('regions')->firstOrCreate(['name' => 'Nouvelle-Aquitaine ','identifier' => 'nouvelle-aquitaine']);
        DB::table('regions')->firstOrCreate(['name' => 'Occitanie ','identifier' => 'occitanie']);
        DB::table('regions')->firstOrCreate(['name' => 'Pays de la Loire ','identifier' => 'pays-de-la-loire']);
        DB::table('regions')->firstOrCreate(['name' => 'Provence-Alpes-Côte d’Azur ','identifier' => 'provence-alpes-cote-d-azur']);
    }
}
