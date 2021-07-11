<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
     public function paciente(){
     return $this->belongsTo('App\Paciente');
     }
}
