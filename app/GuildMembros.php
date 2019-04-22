<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuildMembros extends Model
{
    protected $connection = '_player';

    protected $table = 'guild_member';

    protected $primaryKey = 'pid';

    public $timestamps = false;

    protected $fillable = [
        'MasterID'
    ];
}
