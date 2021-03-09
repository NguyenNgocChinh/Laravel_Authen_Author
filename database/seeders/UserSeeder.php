<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "user";
        $user->email = "user@gmail.com";
        $user->username="user";
        $user->password = Hash::make('1');
        $user->save();
        $user = new User();
        $user->name = "gest";
        $user->email = "gest@gmail.com";
        $user->username="gest";
        $user->password = Hash::make('1');
        $user->save();


        $user = new User();
        $user->name = "admin";
        $user->email = "admin@gmail.com";
        $user->username="admin";
        $user->password = Hash::make('1');
        $user->save();



    }
}
