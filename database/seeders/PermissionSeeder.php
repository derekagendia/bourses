<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'manage_applications','guard_name' => 'web'],
            ['name' => 'manage_scolarships','guard_name' => 'web'],
            ['name' => 'manage_users','guard_name' => 'web'],
        ]);
    }
}
