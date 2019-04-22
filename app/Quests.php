<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quests extends Model
{
    protected $connection = '_player';

    protected $table = 'quest';

    public $timestamps = false;

    protected $primaryKey = 'dwPID';
}
