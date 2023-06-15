<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $role1 = Role::create(['name'=>'admin']);
        $permission9 = Permission::create(['name'=>'add teacher']);
        $permission10 = Permission::create(['name'=>'add course']);
        $permission11 = Permission::create(['name'=>'assign course']);
       
        $role1->givePermissionTo([$permission9, $permission10, $permission11]);
        //$permission->assignRole($role1); //alternate way to assign permission to role1

        
        
        $role2 = Role::create(['name'=>'teacher']);
        $permission1 = Permission::create(['name'=>'add course outline']);
        $permission2 = Permission::create(['name'=>'add attendance']);
        $permission3 = Permission::create(['name'=>'add model solutions']);
        $permission4 = Permission::create(['name'=>'add results']);
        $permission5 = Permission::create(['name'=>'add question papers']);
        $permission6 = Permission::create(['name'=>'add lecture notes']);
        $permission7 = Permission::create(['name'=>'add samples']);
        $permission8 = Permission::create(['name'=>'add course logs']);
        $permission12 = Permission::create(['name'=>'add course description topic detail']);
        $permission13 = Permission::create(['name'=>'add course outline topic detail']);
        $permission14 = Permission::create(['name'=>'view courses']);

        //$permissions = Permission::all();
        $role2->givePermissionTo([$permission1, $permission2, $permission3, $permission4,
         $permission5, $permission6, $permission7, $permission8, $permission12, $permission13, $permission14]);
        //$role2->givePermissionTo($permissions);
        
        //$role->syncPermissions(['add attendance', 'add model', 'add solutions']);




    }
}
