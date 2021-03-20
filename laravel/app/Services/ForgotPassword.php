<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use Mail;

class ForgotPassword
{

	private function forgotMechanisme ($request) {
		$email = $request->input('email-forgot');
		// select user 
		$user = DB::select('SELECT * FROM `user` WHERE `email` = ?', [$email]);

		if (!empty($user)) {
			// do new unique id
			$token = random_int(0, 4564684644655846548);

			// create new link
			$link = $_SERVER['HTTP_HOST'].'/new-password/?email='.$email.'&token='.$token;
			

			$data = ['link12' => $link];

      // you need to turn up it on server

			/*Mail::send('mail/passwordmail', $data, function($message) use ($email)
			{
				$message->from('us@example.com', 'Auction');

				$message->to($email)->cc('bar@example.com');

				$message->attach('$pathToFile');
			});*/

			// update user reset token
			DB::update('UPDATE `user` SET `reset_token` = ? WHERE `email` = ?', [$token, $email]);
			return true;
			

		} else {
			return 'User not found';
		}
	}

	public function forgot ($request) {
		return $this->forgotMechanisme($request);
	}
}