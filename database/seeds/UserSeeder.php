<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Permiso;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permiso = Permiso::where('rol', 'administrador')->first();
        $user = new User();
        $user->tipo_documento = 'C.C';
        $user->documento = 1022347048;
        $user->name = 'Orlin Javier';
        $user->apellido = 'Carrillo Miranda';
        $user->username = 'ocarrillo';
        $user->email = 'orlinjaviercami@hotmail.com';
        $user->password = bcrypt('admin');
        $user->save();
        $user->permisos()->attach($permiso);

        $permiso = Permiso::where('rol', 'medico')->first();
        $user = new User();
        $user->tipo_documento = 'C.C';
        $user->documento = 1059785805;
        $user->name = 'Luz Danery';
        $user->apellido = 'Bedoya Grajales';
        $user->username = 'lbedoya';
        $user->email = 'luzdabe@hotmail.com';
        $user->password = bcrypt('prueba');
        $user->save();
        $user->permisos()->attach($permiso);

        $permiso = Permiso::where('rol', 'general')->first();
        $user = new User();
        $user->tipo_documento = 'C.C';
        $user->documento = 1059785805;
        $user->name = 'Nicolas';
        $user->apellido = 'Carrillo';
        $user->username = 'ncarrillo';
        $user->email = 'nicolas@hotmail.com';
        $user->password = bcrypt('prueba');
        $user->save();
        $user->permisos()->attach($permiso);
}
}
