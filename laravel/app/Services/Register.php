<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class Register
{
	private function registerMec($request) {	
			// initialize variables to use
			$email = trim(filter_var($request->input('emailr'), FILTER_VALIDATE_EMAIL));
			$login = trim($request->input('text-r'));
			$password = trim($request->input('password-register'));
			$passwordAgain = trim($request->input('password-register-again'));
			$confirm = trim($request->input('apply'));
			$sender = trim($request->input('subscribe'));

			$error = array();

			// check for sender
			if (isset($sender)) {
				$sender = '1';
			} else {
				$sender = '0';
			}

			// if correct email - continue
		if (mb_strlen($password) >= 8) {
			if (isset($confirm)) {
				if ($email != false) {
					// select user for check for login and email
					$checkFor = DB::select('SELECT * FROM `user` WHERE `login` = ? OR `email` = ?', [$login, $email]);

					// if user empty - continue
					if (empty($checkFor)) {
						// check for password
						if ($password == $passwordAgain) {
							// create new user
							DB::insert('INSERT INTO `user` (`login`, `email`, `password`, `sendEmails`) VALUES (?,?,?,?)', [$login, $email, password_hash($password, PASSWORD_DEFAULT), $sender]);
							// return true for javascript
							return true;
					} else {
						$error[] = 'Passwords isn`t the same';
					}
				} else {
					$error[] = 'User with the same login or email isset';
				}
				} else {
					$error[] = 'Email is incorrect';
				}
			} else {
				$error[] = 'Please confirm rules';
			}
		} else {
			$error[] = 'Password must to contain more than 8 symbols';
		}

		if (!empty($error)) {
			return array_shift($error);
		}

	}

	public function register($request) {
		return $this->registerMec($request);
	}
}