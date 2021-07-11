<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\RestablecerContraseña;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;



class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, Notifiable;


    protected $table = 'users';

    protected $fillable = [
        'username', 'name', 'email', 'password', 'tipo_documento', 'documento', 'apellido',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function permisos(){
        return $this->belongsToMany(Permiso::class);
    }
    public function historiasClinicas(){
        return $this->hasMany(HistoriasClinicas::class);
    }
    public function hospitalizacion(){
        return $this->belongsTo(Hospitalizacion::class);
    }

    public function authorizePermisos($permisos){
        if ($this->hasAnyPermisos($permisos)) {
            return true;
        }
        abort(401,'Esta accion no esta autorizada');
    }

    public function hasAnyPermisos($permisos){
        if (is_array($permisos)) {
            foreach ($permisos as $permiso) {
                if ($this->hasPermiso($permiso)) {
                    return true;
                }
            }
        }
        else {
            if ($this->hasPermiso($permisos)) {
                return true;
            }
        }
        return false;
    }

    public function hasPermiso($permiso){
        if ($this->permisos()->where('rol', $permiso)->first()) {
            return true;
        }
        return false;
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new RestablecerContraseña($token));
    }
}
