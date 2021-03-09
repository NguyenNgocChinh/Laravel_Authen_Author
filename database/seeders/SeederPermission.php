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
        $arr = ['create','read','update','delete','special1','special2','special3'];
        for ($i = 0; $i<= 6; $i++){
            DB::table('permission')->insert([
                'name' => $arr[$i]
            ]);
        }
    }
}
