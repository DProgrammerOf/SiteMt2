<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Eventos;
use Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {

    	$EventosCache = Cache::remember('eventos.index.new', 0, function() {
            	 return Eventos::where('visivel', 1)->get();
            });

	    // Sharing is caring
	  //  dd($EventosCache);
	    \View::share('eventos', $EventosCache);
    }
}
