<?php

use Illuminate\Database\Seeder;
use App\Sexo;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sexo = new Sexo();
        $sexo->sexo = "Hembra";
        $sexo->save();
        $sexo = new Sexo();
        $sexo->sexo = "Macho";
        $sexo->save();
    }
}
