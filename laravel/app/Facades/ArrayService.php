<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;	

class ArrayService extends Facade
{
	protected static function getFacadeAccessor() {
		return "ArrayOperations";
	}
}