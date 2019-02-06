<?php

use Illuminate\Database\Seeder;

class CoutryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = new \App\Country;
        $country->name = "Nepal";
        $country->save();
        $country = new \App\Country;
        $country->name = "Japan";
        $country->save();
    }
}
