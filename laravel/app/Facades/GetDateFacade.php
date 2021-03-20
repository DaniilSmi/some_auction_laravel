<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;	

class GetDateFacade extends Facade
{
	protected static function getFacadeAccessor() {
		return "getDate";
	}
}