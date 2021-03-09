<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Seeder;

class SeederUserGroup extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('username','gest')->first();
        $group = Group::where('name','gest')->first();
        $user->group()->attach($group);

        $user = User::where('username','user')->first();
        $group = Group::where('name','user')->first();
        $user->group()->attach($group);


        $user = User::where('username','admin')->first();
        $group = Group::where('name','admin')->first();
        $user->group()->attach($group);
    }
}
