<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    protected $primaryKey = 'documento';

     public function pacientes(){
     return $this->hasMany('App\Paciente');
     }
     public function historia(){
     return $this->belongsTo('App\HistoriaClinica');
     }
}
