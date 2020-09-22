<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'title', 
        'allDay', 
        'start', 
        'end',
        'backgroundColor', 
        'borderColor', 
        'textColor',
        'overlap',
        'startEditable',
        'durationEditable'
    ];
    
    protected $cast = [
        'allday' => 'boolean',
    ];
}
