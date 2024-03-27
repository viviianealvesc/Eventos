<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'items' => 'array'
    ];

    protected $dates = ['date'];

    protected $guarded = [];

    public function user() { // um evento possui um usuario
        return $this->belongsTo('App\Models\User');
    }

    public function users() { // um evento possui muitos usuarios
        return $this->belongsToMany('App\Models\User');
    }
}
