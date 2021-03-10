<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederProduct extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i<= 20; $i++){
            DB::table('product')->insert([
                'name' => 'San pham thu ' . $i,
                'price' => rand(0,100),
                'description' => 'Day la noi dung',
                'userId' => rand(1,3),
            ]);
        }
    }
}
