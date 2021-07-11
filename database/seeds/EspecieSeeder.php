<?php

use Illuminate\Database\Seeder;
use App\Especie;

class EspecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $especie = new Especie();
       $especie->especie = "Perro";
       $especie->save();
       $especie = new Especie();
       $especie->especie = "Gato";
       $especie->save();
       $especie = new Especie();
       $especie->especie = "Ave";
       $especie->save();
    }
}
