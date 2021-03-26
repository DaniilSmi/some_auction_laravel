<?php

	namespace App\Http\Controllers;
	use Illuminate\Routing\Controller as BaseController;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;


	use ArrayOp;
	use SearchOp;
	use GetDate;
	use commentNew;
	use commentHtml;
	use UpO;

	/**
	 *  Do ajax requests
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */

	class PostAjaxController extends BaseController
	{

		public function returnQuery(Request $request) {
			$this->offset = $request->input('query');
			$result = DB::select('select * from `car-imp` ORDER BY  FIELD(`status`, 1, 0), `time_to_end`  LIMIT 9 OFFSET ?', [$this->offset]);

			return json_encode(ArrayOp::doArrayCar($result));

		}

		public function returnNewCars() {
			$result = DB::select('SELECT * FROM `car-imp` ORDER BY `upload_time` DESC LIMIT 10');

			return json_encode(ArrayOp::doArrayNewCar($result));
		}

		public function returnPgInfo () {
			$result = DB::select('SELECT count(*) FROM `car-imp`');

			return json_encode($result);
		}

		public function returnTitles (Request $request) {
			$request = $request->input('query');
			$query = SearchOp::getResultSql($request);

			$result = DB::select($query);

			return $result;
		}



		public function getTime($id) {
			// return date from service
			return json_encode(GetDate::getData($id));
		}




		public function createComment(Request $request) {
			return commentNew::createComment($request);
		} 

		public function getNewestComments($id) {
			$comments = DB::select('SELECT * FROM `comments_car` WHERE `car_id` = ? ORDER BY   `add_date` DESC', [$id]);
			return json_encode(commentHtml::commentBody($comments));
		}

		public function getUpvotedComments($id) {
			$comments = DB::select('SELECT * FROM `comments_car` WHERE `car_id` = ? ORDER BY `Upvotes` DESC', [$id]);
			return json_encode(commentHtml::commentBody($comments));
		}


		public function getSellerComments($id) {
			$comments = DB::select('SELECT * FROM `comments_car` WHERE `car_id` = ? AND `is_seller` = 1 ORDER BY `add_date` DESC' , [$id]);

			// return right array
			foreach ($comments as $key => $element) {
				// if comment has parent - load the parent
				if ($element->parent_id != null) {
					// select parent from db
					$add_parent = DB::select('SELECT * FROM `comments_car` WHERE `id` = ?', [$element->parent_id]);
					// add parent to comments if it`s unquie
					if (!in_array($add_parent[0], $comments)) {
						$comments[] = $add_parent[0];
					}
				}
			}


			return json_encode(commentHtml::commentBody($comments));
		}

		public function getBidsComments($id) {
			$comments = DB::select("SELECT * FROM `comments_car` WHERE `car_id` = ? AND `type` = 'bid' ORDER BY `add_date` DESC", [$id]);
			return json_encode(commentHtml::commentBody($comments));
		}

		public function addUpvote($id, Request $request) {
			// add upvote
			return json_encode(UpO::addUpvote($id, $request));
		}
	} 