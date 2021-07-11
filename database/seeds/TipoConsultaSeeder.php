<?php

use Illuminate\Database\Seeder;
use App\TipoConsulta;

class TipoConsultaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $consulta = new TipoConsulta();
        $consulta->descripcion = "Primera vez";
        $consulta->save();
        $consulta = new TipoConsulta();
        $consulta->descripcion = "Urgencias";
        $consulta->save();
        $consulta = new TipoConsulta();
        $consulta->descripcion = "Control";
        $consulta->save();
    }
}
