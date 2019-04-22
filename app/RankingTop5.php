<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RankingTop5 extends Model
{
	protected $connection = '_player';

    protected $table = 'ranking_top5';

    public $timestamps = false;

    protected $fillable = [
        'NickName',
        'ClasseImg',
        'Posicao',
        'ImperioId',
        'ranking'
    ];
}
