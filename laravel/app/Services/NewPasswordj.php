<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class NewPasswordj
{
	private function password ($get, $request) {
		$error = array();
		// check get data validity and initialize variables to use
		if (isset($get['email'])) {
			$email = $get['email'];
		} else {
			abort(404);
		}

		if (isset($get['token'])) {
			$token = $get['token'];
		} else {
			abort(404);
		}

		// get user from database to use
		$user_data = DB::select('SELECT * FROM `user` WHERE `email` = ? LIMIT 1',[$email]);

		if (!empty($user_data)) {
			$user_data = $user_data[0];
			// check for data validity
			if ($user_data->reset_token == $token) {
				// check for button is set
				if ($request->has('submit-button-reset')) {
					// intialize variables
					$password1 = $request->input('password-reset');
					$password2 = $request->input('password-reset-again');

					// check for passwords validity
					if ($password1 == $password2) {
						if (mb_strlen($password1) >= 8) {
							// update user password and delete it`s reset token
							DB::update('UPDATE `user` SET `password` = ?, `reset_token` = ""', [password_hash($password1, PASSWORD_DEFAULT)]);
							// redirecting the user to the main page
							return redirect('/');
						} else {
							$error[] = 'Password need`s to contain more than 8 symbols';
						}
					} else {
						$error[] = 'Passwords isn`t the same';
					}
				}

				// returning our form
				return View::make('folder/resetPasswordTrue', ['error' => array_shift($error)]);
			} else {
				abort(404);
			}
		}	else {
			abort(404);
		}

	}

	public function intPassword ($get, $request) {
		return $this->password($get, $request);
	}
}