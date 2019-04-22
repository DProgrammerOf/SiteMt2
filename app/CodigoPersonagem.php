<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodigoPersonagem extends Model
{
    protected $table = 'recup_codperso';

    protected $primaryKey = 'account_id';

    protected $fillable = ['account_id', 'count'];
}