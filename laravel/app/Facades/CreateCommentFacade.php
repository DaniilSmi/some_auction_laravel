<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;	

class CreateCommentFacade extends Facade
{
	protected static function getFacadeAccessor() {
		return "newComment";
	}
}