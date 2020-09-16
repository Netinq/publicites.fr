<?php

use Illuminate\Database\Seeder;
use App\Config;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::firstOrCreate(['name' => 'price','integer' => 48]);
        Config::firstOrCreate(['name' => 'fb_link', 'string' => 'https://www.facebook.com/sharer/sharer.php?u=publicites.fr']);
        Config::firstOrCreate(['name' => 'email', 'string' => 'contact@frfr.fr']);
    }
}
