<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDestaque extends Model
{
    protected $table = 'admin_itemdestaque';

    public $timestamps = false;

    protected $fillable = [
        'id_lista',
        'texto',
        'img',
        'visivel'
    ];
}
