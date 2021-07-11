<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermisoSeeder::class,
            UserSeeder::class,
            EspecieSeeder::class,
            RazaSeeder::class,
            SexoSeeder::class,
            TipoConsultaSeeder::class
        ]);
    }
}
