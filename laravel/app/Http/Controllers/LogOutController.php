<?php
/*LogOutController*/


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

class LogOutController extends BaseController
{
		public function logout (Request $request) {
			// delete session

			$request->session()->forget('loggined_user'); /*Use flush()*/
			// redirecting user
			return redirect('/');
		}
}
