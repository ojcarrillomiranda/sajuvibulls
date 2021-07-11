<?php

use Illuminate\Database\Seeder;
use App\Raza;

class RazaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $raza = new raza();
       $raza->raza = "Labrador";
       $raza->save();
       $raza = new raza();
       $raza->raza = "Pastor aleman";
       $raza->save();
       $raza = new raza();
       $raza->raza = "Golden retriever";
       $raza->save();
       $raza = new raza();
       $raza->raza = "Boxer";
       $raza->save();
       $raza = new raza();
       $raza->raza = "Beagle";
       $raza->save();
       $raza = new raza();
       $raza->raza = "Bulldog";
       $raza->save();
       $raza = new raza();
       $raza->raza = "Rottweiler";
       $raza->save();
       $raza = new raza();
       $raza->raza = "Chihuahua";
       $raza->save();
       $raza = new raza();
       $raza->raza = "Dalmata";
       $raza->save();
       $raza = new raza();
       $raza->raza = "Pitbull";
       $raza->save();
       $raza = new raza();
       $raza->raza = "Persa";
       $raza->save();
       $raza = new raza();
       $raza->raza = "Siames";
       $raza->save();
       $raza = new raza();
       $raza->raza = "Bengala";
       $raza->save();
       $raza = new raza();
       $raza->raza = "Abisinio";
       $raza->save();
       $raza = new raza();
       $raza->raza = "Siberiano";
       $raza->save();
       $raza = new raza();
       $raza->raza = "azul ruso";
       $raza->save();
       $raza = new raza();
       $raza->raza = "Otra";
       $raza->save();
    }
}
