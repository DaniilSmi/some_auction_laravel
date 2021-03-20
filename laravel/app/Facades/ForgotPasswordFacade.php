<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;	

class ForgotPasswordFacade extends Facade
{
	protected static function getFacadeAccessor() {
		return "forgotPassword";
	}
}