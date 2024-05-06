<?php

namespace Database\Seeders;

use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = Admin::create([

            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456')

        ]);

        

        // $role = Role::create(['name' => 'Admin']);

         

        // $permissions = Permission::pluck('id','id')->all();

       

        // $role->syncPermissions($permissions);

         

        // $user->assignRole([$role->id]);
    }
}
