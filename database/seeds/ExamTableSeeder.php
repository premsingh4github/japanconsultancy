<?php

use Illuminate\Database\Seeder;

class ExamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('exams')->insert([
            ['name'=>'1st Term'],
            ['name'=>'2nd Term'],
            ['name'=>'3rd Term'],
            ['name'=>'4th Term'],
            ['name'=>'Assignment'],

        ]);
    }
}
