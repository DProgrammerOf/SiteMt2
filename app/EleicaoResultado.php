<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EleicaoResultado extends Model
{
    //
    protected $table = 'admin_eleicao_resultado';

    public $timestamps = false;

    protected $fillable = [
        'id_player',
        'nickname',
        'votos',
        'id_reino'
    ];
}
