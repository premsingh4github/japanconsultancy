<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            ['name'=>'admin','email'=>'admin@gmail.com','role_id'=>'1','password'=>bcrypt('admin123')],
            ['name'=>'staff','email'=>'staff@gmail.com','role_id'=>'2','password'=>bcrypt('staff123')]

        ]);
    }
}
