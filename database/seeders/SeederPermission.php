<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['add','edit','delete'];
        for ($i = 0; $i<= 2; $i++){
            DB::table('permission')->insert([
                'name' => $arr[$i]
            ]);
        }
    }
}
