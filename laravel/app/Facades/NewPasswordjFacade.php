<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;	

class NewPasswordjFacade extends Facade
{
	protected static function getFacadeAccessor() {
		return "NewPS";
	}
}