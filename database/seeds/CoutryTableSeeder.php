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
        $country->name = "日本";
        $country->save();
        $country = new \App\Country;
        $country->name = "ネパール";
        $country->save();
        $country = new \App\Country;
        $country->name = "ウズベキスタン";
        $country->save();
        $country = new \App\Country;
        $country->name = "ベトナム";
        $country->save();
        $country = new \App\Country;
        $country->name = "中国";
        $country->save();
        $country = new \App\Country;
        $country->name = "スリランカ";
        $country->save();
        $country = new \App\Country;
        $country->name = "ミャンマー";
        $country->save();
        $country = new \App\Country;
        $country->name = "韓国";
        $country->save();
        $country = new \App\Country;
        $country->name = "バングラデシュ";
        $country->save();
    }
}
