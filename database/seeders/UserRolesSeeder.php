<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=[['name'=>'SUPER_ADMIN'],['name'=>'ADMIN'],['name'=>'USER']];
        Role::insert($roles);
    }
}
