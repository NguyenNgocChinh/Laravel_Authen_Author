<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['gest','employee','admin'];
        for ($i = 0; $i<= 2; $i++){
            DB::table('roles')->insert([
                'name' => $arr[$i]
            ]);
        }
    }
}
