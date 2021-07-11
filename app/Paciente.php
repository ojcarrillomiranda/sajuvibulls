<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
      protected $table = 'pacientes';
      
     public function especie(){
     return $this->belongsTo('App\Especie');
     }
     public function representante(){
     return $this->belongsTo('App\Persona');
     }
     public function raza(){
     return $this->belongsTo('App\Raza');
     }
     public function sexo(){
     return $this->belongsTo('App\Sexo');
     }
      public function historia(){
      return $this->belongsTo('App\HistoriaClinica');
      }
}
