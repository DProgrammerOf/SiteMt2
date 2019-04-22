<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guilds extends Model
{
    protected $connection = '_player';

    protected $table = 'guild';

    public $timestamps = false;

    protected $fillable = [
        'GuildName',
        'GuildDono',
        'PtsRank',
        'Level',
        'Experiencia',
        'Vitorias',
        'Derrotas',
        'Empates',
        'Imperio',
        'ImperioId',
        'ImperioCor'
    ];
}
