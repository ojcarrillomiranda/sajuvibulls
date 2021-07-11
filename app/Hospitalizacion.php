<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospitalizacion extends Model
{
    protected $table = 'hospitalizaciones';
    protected $guarded = [];

    public function m(){
        return $this->belongsTo(User::class);
    }

    public function historias(){
        return $this->hasMany(HistoriaClinica::class);
    }
    public function tipoConsultas(){
        return $this->hasMany(TipoConsulta::class);
    }
}
