<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    public function paciente(){
        return $this->belongsTo('App\Paciente');
    }

    public function historia(){
        return $this->belongsTo(Historia::class);
    }
}
