<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EleicaoVotos extends Model
{
    protected $table = 'eleicao_votos';

    protected $fillable = [
        'id_conta',
        'id_eleicao',
        'id_candidato'
    ];
}
