<?php

use Illuminate\Database\Seeder;

class PeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = new \App\Period;
        $country->name = "A1";
        $country->save();

        $country = new \App\Period;
        $country->name = "A2";
        $country->save();

        $country = new \App\Period;
        $country->name = "A3";
        $country->save();

        $country = new \App\Period;
        $country->name = "A4";
        $country->save();

    }
}
