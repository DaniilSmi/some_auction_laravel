<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use DateTime;

class CommentHtmlService
{
	private function doHtml($array) {
		// variables for commentses html
		$html = '';
		$seller = '';
		$textts = '';

		
		// fliping the array
		foreach ($array as $key => $element) {
			// select user for put it`s information into html
			$user = DB::select('SELECT * FROM `user` WHERE `id` = ?', [$element->user_id]);
			$user = $user[0];
			$veri = '';
			// parent id for comments
			$pr = $element->id;

			// set new parent id
			if ($element->parent_id != null) {
				$pr = $element->parent_id;
			}

			// add verififed icon
			if ($user->is_verified == 1) {
				$veri = '<svg class="verified" width="17" height="17" fill="none" xmlns="http://www.w3.org/2000/svg" aria-labelledby="v-rkJj5dkREliotJamesv"><title id="v-rkJj5dkREliotJamesv">Registered Bidder</title><path d="M6.166 1.286c.952-1.715 3.418-1.715 4.37 0l.425.764.84-.24c1.886-.54 3.63 1.205 3.091 3.09l-.24.841.764.425c1.715.952 1.715 3.418 0 4.37l-.764.425.24.84c.54 1.886-1.205 3.63-3.09 3.091l-.841-.24-.424.764c-.953 1.715-3.419 1.715-4.371 0l-.425-.764-.84.24c-1.886.54-3.63-1.205-3.091-3.09l.24-.841-.764-.424c-1.715-.953-1.715-3.419 0-4.371l.764-.425-.24-.84C1.27 3.015 3.015 1.27 4.9 1.81l.841.24.425-.764z" fill="#0c4370"></path><path d="M11.5 6.351l-3.625 4.5L6 9.033" stroke="#0F2236" stroke-linecap="round" stroke-linejoin="round"></path></svg>';
			}

			// check for seller
			if ($element->is_seller == 1) {
				$seller = '<div class="seller"><span>Seller</span></div>';
			} else {
				$seller = '';
			}

			// check for comment type

			if ($element->type == 'bid') {
				$textts = '<p><div class="bid-styles">'.$element->text.'</div></p>';
			} else {
				$textts = '<p>'.$element->text.'</p>';
			}

			$time = new DateTime($element->add_date);
			$time = $time->format('l, F d g:ia');

			// set html

			$html = $html.'<div class="comment-in-infile">
										<div class="comment-header"><img class="seller-image" src="/images/ferrari.jpg"><a href="#" class="seller-name-comment table-a">'.$user->login.'</a>'
										.$veri.$seller.'<span id="time-for-comment">'.$time.'</span></div>
										<div class="comment-text">'.$textts.'</div>
										<div class="buttons-comment"><button type="button" class="button-upvote" value="'.$element->id.'"><img class="reputation" src="/images/png.png"> <span class="cct">'.$element->upvotes.'</span></button>
											<button class="reply-button-comment" onclick="showReply(`'.$user->login.'`, '.$pr.');"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAEYSURBVHgB7ZbfjYJAEMZnJ/DGgyVsCWcHdx0cFZxXiViBJaDPhBArsATtQDqQAvjjN8lCfGFFdo0vfsmwOzCZ3+4wbCCCiqJYwDS9QCyJ27a9wi5pmi7Is7iua907URR9kWcxvVgfwPsBAc2Uae8tM5/jON6Mxc3eAdp7heEXkASwtXdAEAQ7DKXMbRBGYDU4zJomCmUpEf/zCMImoIf80ROaAmEEVV3X7Y3/bavnHIiSi5ymeHDCVJv7JaAHWDUVpJTSsKECgCbSXaq/YdrueAdxVtM0y6GLzFaXmP5j5WdyVxmGYaXIk/I8l7onfXJ5L7JoL4Cx5OI4A2zJnQGPkjsBkHyFIbUlF/k4rkeTOyvLMvnyrX8iN055my2av4UmAAAAAElFTkSuQmCC"></button>
										</div>
									</div>';


		}

		unset($seller);
		return $html;
	}

	private function commentBodyMechanisme($array) {
		// create new null arrays
		$comments = array();
		$final_comments = array();

		if (!empty($array)) {
			// create new array for working
			foreach ($array as $key => $element) {
				if ($element->parent_id == null) {
					$comments['parent'][$key] = $element;
				} else {
					$comments['child'][$key] = $element;
				}
			}

			// reverse child array 
			if (!empty($comments['child'])) {
				$comments['child'] = array_reverse($comments['child']);
			}

			// create fork
			foreach ($comments['parent'] as $key => $element) {
				$final_comments[] = $element;
				if (!empty($comments['child'])) {
				foreach ($comments['child'] as $key => $value) {
					if ($value->parent_id == $element->id) {
						$final_comments[] = $value;
					}
				}
			}
		}


		// do html for fork
		return $this->doHtml($final_comments);
	} else {
		return '<div style="margin-top: 2rem;"><h3>Comments not found</h3></div>';
	}
	}

	public function commentBody($array) {
		return $this->commentBodyMechanisme($array);
	}
}