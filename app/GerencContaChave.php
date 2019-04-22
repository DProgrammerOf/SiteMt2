<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GerencContaChave extends Model
{
    protected $table = 'account_tranc_keys';

    public $timestamps = false;

    protected $fillable = [
        'account_id',
        'key',
        'key_base64'
    ];
}
