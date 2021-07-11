<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoConsulta extends Model
{
    protected $table = 'tipo_consultas';
    public function historias(){
        return $this->hasMany(HistoriaClinica::class);
    }
    public function hospitalizacion(){
        return $this->belongsTo(Hospitalizacion::class);
    }
}
