<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doacao extends Model
{
    //
    protected $table = 'admin_doacao';

    public $timestamps = false;

    protected $fillable = [
        'tipo_doacao',
        'valor',
        'bonus',
        'cash',
        'link',
        'img',
        'agencia',
        'conta',
        'titular',
        'banco',
        'visivel'
    ];
}
