<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('sedes')->insert([
            'sedenomb' => 'Norte',
            'sedeabrv' => 'nort',
        ]);

        DB::table('sedes')->insert([
            'sedenomb' => 'Sur',
            'sedeabrv' => 'sur',
        ]);

        DB::table('sedes')->insert([
            'sedenomb' => 'Este',
            'sedeabrv' => 'este',
        ]);

        DB::table('sedes')->insert([
            'sedenomb' => 'Oeste',
            'sedeabrv' => 'oeste',
        ]);

        DB::table('sedes')->insert([
            'sedenomb' => 'NorOriente',
            'sedeabrv' => 'norori',
        ]);


        //CIUDADES

        DB::table('ciudades')->insert([
            'ciudnomb' => 'Cali',
            'ciudabrv' => 'cali'
        ]);


        DB::table('ciudades')->insert([
            'ciudnomb' => 'Buga',
            'ciudabrv' => 'buga'
        ]);

        DB::table('ciudades')->insert([
            'ciudnomb' => 'Pasto',
            'ciudabrv' => 'pasto'
        ]);


        DB::table('ciudades')->insert([
            'ciudnomb' => 'Medellin',
            'ciudabrv' => 'medellin'
        ]);

        //usuarios 

        DB::table('usuarios')->insert([
            'usuaident' => '23424234',
            'usuanomb' => 'JAO',
            'usuanomb1' => 'jaime',
            'usuanomb2' => 'Andres',
            'usuaapell1' => 'Ortiz',
            'usuaapell2' => ''
        ]);

        DB::table('usuarios')->insert([
            'usuaident' => '2347344',
            'usuanomb' => 'PSS',
            'usuanomb1' => 'Pablo',
            'usuanomb2' => 'Sao',
            'usuaapell1' => 'Sanchez',
            'usuaapell2' => ''
        ]);

        DB::table('usuarios')->insert([
            'usuaident' => '23423623423',
            'usuanomb' => 'MFH',
            'usuanomb1' => 'Monica',
            'usuanomb2' => 'Fernanda',
            'usuaapell1' => 'Hernandez',
            'usuaapell2' => ''
        ]);

        DB::table('usuarios')->insert([
            'usuaident' => '5234234234',
            'usuanomb' => 'PAP',
            'usuanomb1' => 'pepito',
            'usuanomb2' => 'Andres',
            'usuaapell1' => 'Perez',
            'usuaapell2' => ''
        ]);

        DB::table('usuarios')->insert([
            'usuaident' => '262342342',
            'usuanomb' => 'JMF',
            'usuanomb1' => 'Juana',
            'usuanomb2' => 'Maria',
            'usuaapell1' => 'Fernandez',
            'usuaapell2' => ''
        ]);
    }
}
