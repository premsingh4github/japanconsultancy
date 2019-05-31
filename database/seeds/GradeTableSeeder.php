<?php

use Illuminate\Database\Seeder;

class GradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grade = new \App\Grade();
        $grade->name = "第1学年";
        $grade->save();

        $grade = new \App\Grade();
        $grade->name = "第2学年";
        $grade->save();
    }
}
