<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jogadores extends Model
{
	protected $connection = '_player';

    protected $table = 'player';

    public $timestamps = false;

    protected $fillable = [
        'NickName',
        'Level',
        'Experiencia',
        'Classe',
        'RacaClasse',
        'ClasseNome',
        'ClasseImg',
        'Guild',
        'GuildLevel',
        'GuildVitorias',
        'Cargo',
        'Imperio',
        'ImperioId',
        'ImperioCor',
        'PtsGeral',
        'PtsColiseu',
        'PtsKill',
        'PtsRank',
        'PtsDragao'
    ];
}
