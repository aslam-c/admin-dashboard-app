<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;
use Illuminate\Support\Arr;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=Role::get('id')->toArray();

        $userRole=Role::where('name','USER')->first()->toArray();
        $adminUserRole=Role::where('name','ADMIN')->first()->toArray();
        $superAdminRole=Role::where('name','SUPER_ADMIN')->first()->toArray();

        $normalUser=User::create(['name'=>'user','email'=>'user@gmail.com','password'=>Hash::make('asd123')]);
        $normalUser->roles()->attach($userRole['id']);

        $adminUser=User::create(['name'=>'admin_user','email'=>'admin@gmail.com','password'=>Hash::make('asd123')]);
        $adminUser->roles()->attach($adminUserRole['id']);

        $superUser=User::create(['name'=>'super_admin_user','email'=>'superadmin@gmail.com','password'=>Hash::make('asd123')]);
        $superUser->roles()->attach($superAdminRole['id']);

        $faker = Factory::create();
        foreach(range(0,20) as $number){
            $roleId=Arr::random($roles);
            $RoleIds=[$roleId];
            $userPassword='asd123';
            $password=Hash::make($userPassword);
            $email=$faker->unique()->safeEmail();
            $name=$faker->name;
            $user=User::create(['email'=>$email,'password'=>$password,'name'=>$name]);
            $user->roles()->attach($roleId);
        }

    }
}
