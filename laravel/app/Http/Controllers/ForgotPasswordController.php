<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use AuthU;
use ForgotPs;


class ForgotPasswordController extends BaseController
{
		public function forgot (Request $request) {

			// Enter forgot mechanisme
			return ForgotPs::forgot($request);
		}
}
