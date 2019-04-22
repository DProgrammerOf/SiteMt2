<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    protected $table = 'account';

    public $timestamps = false;

    protected $fillable = [ 'login', 'password', 'password_normal', 'real_name', 'social_id', 'email', 'coins', 'status' ];

    function isAdmin(){
    if ($this->web_level == 5) 
    	return true;
    else 
    	return false;
    }
}
