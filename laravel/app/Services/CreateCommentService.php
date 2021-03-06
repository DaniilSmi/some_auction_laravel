<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;

class CreateCommentService
{
	private function createCommentMechanisme($request) {
		// check for user`s authentificate
		$carIsset = DB::select('SELECT * FROM `car-imp` WHERE `id` = ?', [$request->input('id_com_car')]);
		$sels = false;

		if (!empty($carIsset)) {
			if ($request->session()->has('loggined_user')) {
				$user = $request->session()->get('loggined_user');

				// check for seller
				if ($user->id == $carIsset[0]->seller_id) {
					$sels = true;
				} else {
					$sels = false;
				}

				if (!empty($request->input('id_com_reply'))) {
					// create reply
					// check for text length
					if ($request->input('comm_text_area') != '') {
						// insert comment
						DB::insert('INSERT INTO `comments_car` (`user_id`, `text`, `parent_id`, `is_seller`, `car_id`) 	VALUES (?,?,?,?,?)', [$user->id, htmlspecialchars($request->input('comm_text_area')), $request->input('id_com_reply'), $sels, $request->input('id_com_car')]);
						return true;
					}
				} else {
					// create comment
					// check for text length
					if ($request->input('comm_text_area') != '') {
						// insert comment

						DB::insert('INSERT INTO `comments_car` (`user_id`, `text`, `is_seller`, `car_id`) 	VALUES (?,?,?,?)', [$user->id,htmlspecialchars($request->input('comm_text_area')), $sels, $request->input('id_com_car')]);
						return true;
					}
				}
			} else {
				return "not-auth";
			}
		}
	}
	public function createComment($request) {
		return $this->createCommentMechanisme($request);
	}
}