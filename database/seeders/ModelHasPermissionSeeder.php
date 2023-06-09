<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_has_permissions')->insert([
            ['model_id' => 1,'model_type'=> 'App\Models\User','permission_id' => 1],
            ['model_id' => 1,'model_type'=> 'App\Models\User','permission_id' => 2],
            ['model_id' => 1,'model_type'=> 'App\Models\User','permission_id' => 3],
        ]);
    }
}
