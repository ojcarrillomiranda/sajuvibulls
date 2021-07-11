<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermisoUser extends Model
{
   protected $table = 'permiso_user';
   protected $guarded = [];

    public function user(){
    return $this->belongsTo(User::class);
    }

     public function permiso(){
     return $this->belongsTo(Permiso::class);
     }

      public function historiaClinica(){
      return $this->belongsTo(HistoriasClinicas::class);
      }
}
