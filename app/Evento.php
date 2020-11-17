<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'title', 
        'description',
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
        'allDay' => 'boolean',
    ];

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }
}
