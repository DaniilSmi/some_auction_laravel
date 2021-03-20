<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;


class Login
{
	private function loginMec($response) {
		// initialize variables 
		$email = trim($response->input('email'));
		$password = trim($response->input('password-login'));
		
		// select user for check
		$user = DB::select('SELECT * FROM `user` WHERE `email` = ? LIMIT 1', [$email]);
		// if isset user - continue
		if (!empty($user)) {
			$user = $user[0];
			// check for password validity
			if (password_verify($password, $user->password)) {
				// set new session
				$response->session()->put('loggined_user', $user);
				return true;
			} else {
				return 'Passwords isn`t the same';
			}
		} else {
			return 'User not found';
		}

		return $email;
	}

	public function login ($response) {
		return $this->loginMec($response);
	}
}