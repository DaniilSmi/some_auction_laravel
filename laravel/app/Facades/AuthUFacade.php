<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;	

class AuthUFacade extends Facade
{
	protected static function getFacadeAccessor() {
		return "AuthU";
	}
}