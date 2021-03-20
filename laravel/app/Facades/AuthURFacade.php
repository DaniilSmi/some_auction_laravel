<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;	

class AuthURFacade extends Facade
{
	protected static function getFacadeAccessor() {
		return "AuthUR";
	}
}