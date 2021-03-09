<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class GroupPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = Group::where('name','gest')->first();
        $permission1 = Permission::where('name','read')->first();
        $group->permission()->attach($permission1);

        $group = Group::where('name','user')->first();
        $permission1 = Permission::where('name','read')->first();
        $permission2 = Permission::where('name','update')->first();
        $permission3 = Permission::where('name','create')->first();
        $group->permission()->attach($permission1);
        $group->permission()->attach($permission2);
        $group->permission()->attach($permission3);


        $group = Group::where('name','admin')->first();
        $permission1 = Permission::where('name','read')->first();
        $permission2 = Permission::where('name','update')->first();
        $permission3 = Permission::where('name','create')->first();
        $permission4 = Permission::where('name','delete')->first();
        $group->permission()->attach($permission1);
        $group->permission()->attach($permission2);
        $group->permission()->attach($permission3);
        $group->permission()->attach($permission4);

    }
}
