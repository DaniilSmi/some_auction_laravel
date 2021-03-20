@extends('base')

@section('title', 'reset password')

@section('content')
	<div class="most-reset-password">
		<div class="new-password-block">
			<h2 style="margin-bottom: 1.5rem;">Please, put the data to reset password</h2>
			<form method="POST" id="login-form">
					{{ csrf_field() }}	
					<label for="password-reset" class="label-for-popup-input">Password</label><br>
					<input type="password" name="password-reset" class="input-popup" id="email-login-popup" required>
					<label for="password-login" class="label-for-popup-input">Password again</label><br>
					<input type="password" name="password-reset-again" class="input-popup" id="email-login-popup" required="">
					<button type="submit" class="submit-popup" name="submit-button-reset">Reset</button>
					<div class="b-href-margin-popup" style="margin-bottom: 1rem;"><span style="color: red;" id="error-register">{{$error}}</span></div>
				</form>
		</div>
	</div>
@stop