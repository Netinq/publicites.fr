<?php

use Illuminate\Database\Seeder;
use App\Region;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::firstOrCreate(['name' => 'Auvergne-Rhône-Alpes ','identifier' => 'auvergne-rhone-alpes']);
        Region::firstOrCreate(['name' => 'Bourgogne-Franche-Comté ','identifier' => 'bourgogne-franche-comte']);
        Region::firstOrCreate(['name' => 'Bretagne ','identifier' => 'bretagne']);
        Region::firstOrCreate(['name' => 'Centre-Val de Loire ','identifier' => 'centre-val-de-loire']);
        Region::firstOrCreate(['name' => 'Corse ','identifier' => 'corse']);
        Region::firstOrCreate(['name' => 'Grand Est ','identifier' => 'grand-est']);
        Region::firstOrCreate(['name' => 'Hauts-de-France ','identifier' => 'hauts-de-france']);
        Region::firstOrCreate(['name' => 'Ile-de-France ','identifier' => 'ile-de-france']);
        Region::firstOrCreate(['name' => 'Normandie ','identifier' => 'normandie']);
        Region::firstOrCreate(['name' => 'Nouvelle-Aquitaine ','identifier' => 'nouvelle-aquitaine']);
        Region::firstOrCreate(['name' => 'Occitanie ','identifier' => 'occitanie']);
        Region::firstOrCreate(['name' => 'Pays de la Loire ','identifier' => 'pays-de-la-loire']);
        Region::firstOrCreate(['name' => 'Provence-Alpes-Côte d’Azur ','identifier' => 'provence-alpes-cote-d-azur']);
    }
}
