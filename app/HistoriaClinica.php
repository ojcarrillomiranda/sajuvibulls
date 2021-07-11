<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaClinica extends Model
{
    protected $table = 'historia_clinicas';
    protected $guarded = [];
    public function paciente(){
    return $this->belongsTo('App\Paciente');
    }
     public function representante(){
     return $this->belongsTo('App\Persona');
     }

     public function medico(){
         return $this->belongsTo(User::class);
     }
     public function tipoConsulta(){
         return $this->belongsTo(TipoConsulta::class);
     }

     public function hospitalizacion(){
         return $this->belongsTo(Hospitalizacion::class);
     }

     public function especie(){
        return $this->belongsTo(Especie::class);
    }
    
     public function raza(){
        return $this->belongsTo(Raza::class);
    }
   

}
