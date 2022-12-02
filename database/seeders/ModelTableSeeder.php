<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('models')->delete();

        DB::table('models')->insert([
            'code' => 'fdgfdgfdg',
            'name' => 'pijama1',
            'brand' => 'kinanit',
            'active' => 'true',
            'image' => 'prueba',
            'title' => 'TIT1',
            'description' => 'fgsfdg',
            'url' => 'gfdgf',
            'color' => 'amarillo',

        ]);

        DB::table('models')->insert([
            'code' => 'fdgfds',
            'name' => 'pijama2',
            'brand' => 'nike',
            'active' => 'true',
            'image' => 'prueba/hola',
            'title' => 'TIT2',
            'description' => 'fgdfdfsfdg',
            'url' => 'gfdgsdfsdfjf',
            'color' => 'rojo',

        ]);
    }
}
