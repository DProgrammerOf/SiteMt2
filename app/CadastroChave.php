<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CadastroChave extends Model
{
    protected $table = 'account_key';

    public $timestamps = false;

    protected $fillable = [
        'account_id',
        'key',
        'key_base64'
    ];
}
