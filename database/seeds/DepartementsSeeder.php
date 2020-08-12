<?php

use Illuminate\Database\Seeder;
use App\Departement;

class DepartementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departement::firstOrCreate(['region_id' => 'corse', 'name' => 'Corse-du-Sud','identifier' => '2A']);
        Departement::firstOrCreate(['region_id' => 'corse', 'name' => 'Haute-Corse','identifier' => '2B']);
    }
}
