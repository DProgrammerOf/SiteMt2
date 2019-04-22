<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodigoArmazem extends Model
{
    protected $table = 'recup_codarmazem';

    protected $primaryKey = 'account_id';

    protected $fillable = ['account_id', 'count'];
}