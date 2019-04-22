<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    protected $table = 'admin_eventos';

    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'desc',
        'link',
        'visivel'
    ];
}
