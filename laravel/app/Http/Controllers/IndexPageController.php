<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use AuthU;

class IndexPageController extends BaseController
{
		public function show () {
			return View::make('folder/IndexPage');
		}
    
}
