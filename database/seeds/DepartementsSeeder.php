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
        Departement::firstOrCreate(['region_id' => 1, 'name' => 'empty','identifier' => 'empty']);
        Departement::firstOrCreate(['region_id' => 1, 'name' => 'empty','identifier' => 'empty']);
        Departement::firstOrCreate(['region_id' => 1, 'name' => 'empty','identifier' => 'empty']);
    }
}
