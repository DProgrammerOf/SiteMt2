<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EleicaoCandidato extends Model
{
    //
    protected $table = 'admin_candidatos_eleicao';

    public $timestamps = false;

    protected $fillable = [
        'id_eleicao',
        'id_player',
        'id_reino',
        'votos',
        'nickname'
    ];
}
