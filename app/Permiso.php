<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
     protected $table = 'permisos';
     public function users(){
     return $this->belongsToMany(User::class);
     }
}
