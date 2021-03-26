<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class AddUpvoteService
{


	private function addUpvoteService($id, $request) {
		// check for authentificate
		if ($request->session()->has('loggined_user')) {
			// get user data from session
			$user = $request->session()->get('loggined_user');
			// select upvotes from db
			$upvotes = DB::select('SELECT * FROM `comments_upvotes` WHERE `comment_id` = ? AND `user_id` = ?', [$id, $user->id]);

			// check for upvotes is set
			if (empty($upvotes)) {
				// add upvote
				DB::insert('INSERT INTO `comments_upvotes` (`user_id`, `comment_id`) VALUES (?,?)', [$user->id, $id]);
				// select comment
				DB::update('UPDATE `comments_car` SET `upvotes` = `upvotes` + 1 WHERE `id` = ?', [$id]);
				
				return 'added';
			} else {
				// delete upvote
				DB::delete('DELETE FROM `comments_upvotes` WHERE `user_id` = ? AND `comment_id` = ?', [$user->id, $id]);
				// select comment
				DB::update('UPDATE `comments_car` SET `upvotes` = `upvotes` - 1 WHERE `id` = ?', [$id]);

				return 'deleted';
			}
		} else {
			return "not-auth";
		}
	}

	public function addUpvote($id, $request) {
		return $this->addUpvoteService($id, $request);
	}
}