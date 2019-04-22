<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleicao extends Model
{
    protected $table = 'admin_eleicao';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'data_inicio',
        'data_termino',
        'visivel',
        'tempo_min',
        'kills_min'
    ];
}
