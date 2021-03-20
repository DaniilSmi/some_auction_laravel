<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use NewPS;

class NewPasswordController extends BaseController
{
		public function new (Request $request) {
			// set data into models
			return NewPS::intPassword($_GET, $request);
		}
}

