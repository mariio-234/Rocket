<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete(); 

        
        DB::table('users')->insert([
            'name' => 'Ejemplo',
            'surname' =>'Ejemplo1',
            'email' => 'ejemplo@domain.com',
            'password' => 'strongpassword',
            'newsletter' => 'true',
            'baja' => 'true',
            'birthday' => '16/08/2022',
            'active' => 'true',
            'sex' => 'H'
        ]);

        DB::table('users')->insert([
            'name' => 'prueba',
            'surname' =>'Prueba2',
            'email' => 'ejemplo1@domain.com',
            'password' => 'strongpassword2',
            'newsletter' => 'true',
            'baja' => 'false',
            'birthday' => '17/10/2015',
            'active' => 'true',
            'sex' => 'M'
        ]);


        //\App\Models\User::factory(10)->create();
    }
}
