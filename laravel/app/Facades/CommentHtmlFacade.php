<?php
/*commentHtml*/

namespace App\Facades;

use Illuminate\Support\Facades\Facade;	

class CommentHtmlFacade extends Facade
{
	protected static function getFacadeAccessor() {
		return "commentHtml";
	}
}