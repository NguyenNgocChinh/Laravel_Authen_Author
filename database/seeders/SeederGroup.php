<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederGroup extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['gest','user','admin'];
        for ($i = 0; $i<= 2; $i++){
            DB::table('group')->insert([
                'name' => $arr[$i]
            ]);
        }
    }
}
