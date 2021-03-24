<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;

class CommentHtmlService
{
	private function doHtml($array) {
		$html = '';
		/*arr.forEach(function callback(curVal, i, array) {
		let cl = "";
    let pr = array[i]['id'];

		if (array[i]['isAnswer'] == true) {
			 cl = "replyCommentStyles";
       pr = array[i]['parent_id'];
		} 

		commArea.innerHTML += '<div class="comment '+cl+'"><img class="userImgComment" src="/asset/img/user/'+array[i]['img_url']+'"><div class="commentInfo"><div class="userName"><span>'+array[i]['user_name']+'</span></div><div class="dateComm"><span>'+array[i]['datetime']+'</span></div><div class="replyComment"><a href="javascript://" onclick="doArea(`'+array[i]['user_name']+'`, `'+pr+'`)">Ответить</a></div><br><div class="commentText"><p>'+array[i]['text']+'</p></div></div></div>';*/
		foreach ($array as $key => $element) {
			$user = DB::select('SELECT * FROM `user` WHERE `id` = ?', [$element->user_id]);
			$user = $user[0];
			$veri = '';

			$pr = $element->id;

			if ($element->parent_id != null) {
				$pr = $element->parent_id;
			}

			if ($user->is_verified == 1) {
				$veri = '<svg class="verified" width="17" height="17" fill="none" xmlns="http://www.w3.org/2000/svg" aria-labelledby="v-rkJj5dkREliotJamesv"><title id="v-rkJj5dkREliotJamesv">Registered Bidder</title><path d="M6.166 1.286c.952-1.715 3.418-1.715 4.37 0l.425.764.84-.24c1.886-.54 3.63 1.205 3.091 3.09l-.24.841.764.425c1.715.952 1.715 3.418 0 4.37l-.764.425.24.84c.54 1.886-1.205 3.63-3.09 3.091l-.841-.24-.424.764c-.953 1.715-3.419 1.715-4.371 0l-.425-.764-.84.24c-1.886.54-3.63-1.205-3.091-3.09l.24-.841-.764-.424c-1.715-.953-1.715-3.419 0-4.371l.764-.425-.24-.84C1.27 3.015 3.015 1.27 4.9 1.81l.841.24.425-.764z" fill="#0c4370"></path><path d="M11.5 6.351l-3.625 4.5L6 9.033" stroke="#0F2236" stroke-linecap="round" stroke-linejoin="round"></path></svg>';
			}

			$html = $html.'<div class="comment-in-infile">.
										<div class="comment-header"><img class="seller-image" src="{{ asset(`images/ferrari.jpg`) }}"><a href="#" class="seller-name-comment table-a">'.$user->login.'</a>'
										.$veri.'<div class="seller"><span>Seller</span></div><span id="time-for-comment">Yesterday</span></div>
										<div class="comment-text"><p>'.$element->text.'</p></div>
										<div class="buttons-comment"><button type="button" class="button-upvote"><svg class="reputation" width="8" height="10" fill="none" xmlns="http://www.w3.org/2000/svg" aria-labelledby="ir-3Olq5AYYuv"><title id="ir-3Olq5AYYuv">Reputation Icon</title><path d="M4 1v8M1 4l3-3 3 3" stroke="#828282" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path></svg> '.$element->upvotes.'</button>
											<button class="reply-button-comment" onclick="showReply(`'.$user->login.'`, '.$pr.');"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAEYSURBVHgB7ZbfjYJAEMZnJ/DGgyVsCWcHdx0cFZxXiViBJaDPhBArsATtQDqQAvjjN8lCfGFFdo0vfsmwOzCZ3+4wbCCCiqJYwDS9QCyJ27a9wi5pmi7Is7iua907URR9kWcxvVgfwPsBAc2Uae8tM5/jON6Mxc3eAdp7heEXkASwtXdAEAQ7DKXMbRBGYDU4zJomCmUpEf/zCMImoIf80ROaAmEEVV3X7Y3/bavnHIiSi5ymeHDCVJv7JaAHWDUVpJTSsKECgCbSXaq/YdrueAdxVtM0y6GLzFaXmP5j5WdyVxmGYaXIk/I8l7onfXJ5L7JoL4Cx5OI4A2zJnQGPkjsBkHyFIbUlF/k4rkeTOyvLMvnyrX8iN055my2av4UmAAAAAElFTkSuQmCC"></button>
										</div>
									</div>';


		}

		return $html;
	}

	private function commentBodyMechanisme($array) {
		$comments = array();
	
		foreach ($array as $key => $element) {
			if ($element->parent_id == null) {
				$comments['parent'][$key] = $element;
			} else {
				$comments['child'][$key] = $element;
			}
		}

		$final_comments = array();

		foreach ($comments['parent'] as $key => $element) {
			$final_comments[] = $element;
			foreach ($comments['child'] as $key => $value) {
				if ($value->parent_id == $element->id) {
					$final_comments[] = $value;
				}
			}
		}

		return $this->doHtml($final_comments);
	}

	public function commentBody($array) {
		return $this->commentBodyMechanisme($array);
	}
}