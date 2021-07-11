<?php

use Illuminate\Database\Seeder;
use App\Permiso;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = new Permiso();
        $permisos->rol = "Administrador";
        $permisos->save();
        $permisos = new Permiso();
        $permisos->rol = "Medico";
        $permisos->save();
        $permisos = new Permiso();
        $permisos->rol = "General";
        $permisos->save();
    }
}
