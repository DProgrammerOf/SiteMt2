<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imperios extends Model
{
    protected $connection = '_player';

    protected $table = 'player_index';

    public $timestamps = false;
}
