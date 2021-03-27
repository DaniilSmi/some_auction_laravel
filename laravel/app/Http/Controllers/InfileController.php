<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DateTime;


class InfileController extends BaseController
{

	
		public function infile (Request $request, $id, $title) {

			$car = DB::select('SELECT * FROM `car-imp` WHERE `id` = ? and `title` = ? LIMIT 1', [$id, $title]);
			$comments = DB::select('SELECT COUNT(*) FROM `comments_car` WHERE `car_id` = ?', [$id]);
			$comments = json_decode(json_encode($comments), true);


			if (!empty($car)) {
				$car = $car[0];
				// set time into car

				$time = new DateTime($car->time_to_end);
				$time = $time->format('l, F d g:ia');

				$car->time_to_end = $time;
				return View::make('folder/carinfile', ['car' => $car, 'comments' => $comments[0]['COUNT(*)']]);
			} else {
				abort(404);
			}
		}
}
