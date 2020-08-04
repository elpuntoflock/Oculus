<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombres', 'apellidos', 'sexo', 'direccion','fecha_nac', 'tel_celular', 'tel_trabajo','observaciones'];
}

