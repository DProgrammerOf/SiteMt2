<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuildCargo extends Model
{
    protected $connection = '_player';

    protected $table = 'guild_grade';

    public $timestamps = false;

    protected $primaryKey = 'grade';
}
