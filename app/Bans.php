<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bans extends Model
{
    protected $table = 'admin_bans';

    public $timestamps = false;

    protected $fillable = [ 'email' ];

    function isBanned( $email ){
    if ($this->email == $email) 
    	return true;
    else 
    	return false;
    }
}
