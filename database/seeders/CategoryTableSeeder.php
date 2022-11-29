<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->delete();

        DB::table('categories')->insert([
            'code' =>'a12345',
            'active' => 'true',
            'name' => 'Hombre',
            'description' => 'Hombre',
            'url' => 'prdsf',
            'parent' => '3',
        ]);

        DB::table('categories')->insert([
            'code' =>'a12345',
            'active' => 'true',
            'name' => 'Mujer',
            'description' => 'Mujer',
            'url' => 'prdsgf',
            'parent' => '2',
        ]);
    }
}
