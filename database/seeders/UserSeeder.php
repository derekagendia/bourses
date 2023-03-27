<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            ['email'=> 'admin@test.com','password'=> Hash::make('000000'),'first_name'=> 'admin','last_name'=> 'admin'],
            ['email'=> 'user@test.com','password'=>  Hash::make('000000'),'first_name'=> 'user','last_name'=> 'user'],
        ]);
    }
}
