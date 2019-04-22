<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Armazem extends Model
{
    protected $connection = '_player';

    protected $table = 'safebox';

    public $timestamps = false;

    protected $primaryKey = 'account_id';
}
