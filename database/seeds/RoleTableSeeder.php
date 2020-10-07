<?php

use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('roles')->delete();

        Role::create(['name' => 'Member', 'slug' => 'member']);
        Role::create(['name' => 'Administator', 'slug' => 'admin']);
    }

}
