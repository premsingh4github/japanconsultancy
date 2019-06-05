<?php

use Illuminate\Database\Seeder;

class MarkSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('markranks')->insert([
            ['name'=>'AA','rank'=>'90'],
            ['name'=>'AB','rank'=>'85'],
            ['name'=>'AC','rank'=>'80'],
            ['name'=>'BA','rank'=>'78'],
            ['name'=>'BB','rank'=>'75'],
            ['name'=>'BC','rank'=>'70'],
            ['name'=>'CA','rank'=>'68'],
            ['name'=>'CB','rank'=>'65'],
            ['name'=>'CC','rank'=>'60'],
            ['name'=>'D','rank'=>'59'],
        ]);
    }
}
