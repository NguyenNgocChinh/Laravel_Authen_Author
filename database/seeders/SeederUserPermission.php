<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;

class SeederUserPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('username','user')->first();
        $permission1 = Permission::where('name','special1')->first();
        $permission2 = Permission::where('name','special2')->first();

        $user->permission()->attach($permission1);
        $user->permission()->attach($permission2);



        $user = User::where('username','admin')->first();
        $permission1 = Permission::where('name','special3')->first();
        $permission2 = Permission::where('name','special2')->first();

        $user->permission()->attach($permission1);
        $user->permission()->attach($permission2);


    }
}
