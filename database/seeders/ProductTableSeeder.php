<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        DB::table('products')->insert([
            'sku' => 'a23432',
            'active' =>'true',
            'model_id' => '1',
            'size' => 'S',
        ]);

        DB::table('products')->insert([
            'sku' => 'a23433',
            'active' =>'true',
            'model_id' => '2',
            'size' => 'L',
        ]);


    }
}
