<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;	

class AddUpvoteFacade extends Facade
{
	protected static function getFacadeAccessor() {
		return "UpO";
	}
}