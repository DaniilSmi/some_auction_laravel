<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}" async>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet" async>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" async>
		@section('styles')
		@show
	</head>
	<body>
		<header class="main-header">
			<div class="href-container container">
				<div class="header-logo"><span>Some logo here</span></div>
				<nav class="nav-header">
					<a href="#" class="nav-header-href">Auctions</a>
					<a href="#" class="nav-header-href">About us</a>
					<a href="#" class="nav-header-href">Find a car</a>
					<a href="#" class="nav-header-href">Daily Email</a>
				</nav>
				<div class="block-buttons">
					<div class="desktop-header-form @if(session()->has('loggined_user'))form-buttons-logged @endif">
						<input type="text" name="header-search" id="header-search" placeholder="Search for cars" autocomplete="off">
						<button type="submit" id="header-search-submit" class="header-button">Search</button>
						<div class="ajax-search-index"><ul class="ajax-search-view">

						</ul></div>
					</div>
								@if(session()->has('loggined_user'))
									<div class="button-user-menu-container"><button type="button" id="user-menu-toogle" class="header-log-button"><img src="{{ asset('images/userS.html') }}"></button>
									<div class="menu-just">
										<ul class="menu-just-li">
											<li><a href="" class="li-href-profile-menu">My profile</a></li>
											<li><a href="" class="li-href-profile-menu">My listenigs</a></li>
											<li><a href="" class="li-href-profile-menu">Settings</a></li>
											<li><a href="/log-out" class="li-href-profile-menu">Sign Out</a></li>
										</ul>
									</div></div>
									<div class="button-user-menu-container"><button type="button" id="notifications-button" class="header-log-button" style="margin: 0;"><img src="{{ asset('images/notti.png') }}"></button>
									<div class="notti-just">
										<ul class="notti-li">
											<li><a href="" class="li-href-profile-menu">fsdfs</a></li>
											<li><a href="" class="li-href-profile-menu">fsdfs</a></li>
											<li><a href="" class="li-href-profile-menu">fsdfs</a></li>
											<li><a href="" class="li-href-profile-menu">fsdfs</a></li>
										</ul>
									</div></div>
								 @else
								 <button id="header-signup-button" class="header-button">Sign in</button>
								@endif
					
				</div>
				<img id="open-mobile-menu-bt" src="{{ asset('/images/burgerIcon.png') }}" onclick="showMobileMenu()">

		</div>

		</header>

		<div class="mobile-header">
			<div class=" container">
				<img id="close-mobile-menu-bt" src="{{ asset('/images/burgerIcon.png') }}" onclick="closeMobileMenu()">
				<div class="jsc"><div class="header-logo mobile-menu-logo"><span>Some logo here</span></div></div>
				<div class="jsc"><div class="block-buttons">
					<div class="mobile-header-form">
						<input type="text" name="header-search" id="header-search" placeholder="Search for cars" autocomplete="off">
						<button type="submit" id="header-search-submit" class="header-button">Search</button>
						<div class="ajax-search-index"><ul class="ajax-search-view">

						</ul></div>
					</div>
				</div></div>
				<nav class="mobile-nav-header">
					<div class="jsc"><a href="#" class="mobile-nav-header-href">Auctions</a></div>
					<div class="jsc"><a href="#" class="mobile-nav-header-href">About us</a></div>
					<div class="jsc"><a href="#" class="mobile-nav-header-href">Find a car</a></div>
					<div class="jsc"><a href="#" class="mobile-nav-header-href">Daily Email</a>
				</nav>
				
		</div>
		</div>

		<div class="login">
			<div class="login-container">
				<a href="javascript://" id="close-login" class="close-popup">&times;</a>
				<div class="jsc popup-name"><span>Sign in</span></div>
				<form action="/login" method="POST" id="login-form">
					{{ csrf_field() }}	
					<label for="email" class="label-for-popup-input">Email address</label><br>
					<input type="email" name="email" class="input-popup" id="email-login-popup" required>
					<label for="password-login" class="label-for-popup-input">Password</label><br>
					<input type="password" name="password-login" class="input-popup" id="email-login-popup" required="">
					<button type="submit" class="submit-popup">Sign in</button>
				</form>
				<div class="b-href-margin-popup"><a href="javascript://" class="popup-a-href" id="open-forgot-password">Forgot your password?</a></div>
				<div class="b-href-margin-popup"><a href="javascript://" class="popup-a-href" id="open-new-account">Create new account?</a></div>
				<div class="b-href-margin-popup"><span style="color: red;" id="error-login"></span></div>
			</div>
		</div>
		<div class="register" role="dialog" tabindex="-1"><div class="register-container">
			<a href="javascript://" id="close-register" class="close-popup">&times;</a>
				<div class="jsc popup-name popup-name-register"><span>Sign up</span></div>
				<form id="register-form" name="register-form" method="POST" action="/register">
					{{ csrf_field() }}
					<input type="text" name="text-r" class="input-popup input-register" id="email-login-popup" placeholder="Public login" required> 
					<input type="email" name="emailr" class="input-popup input-register" id="email-login-popup" placeholder="Email address" required>
					<input type="password" name="password-register" class="input-popup input-register" id="email-login-popup" placeholder="Password" required>
					<input type="password" name="password-register-again" class="input-popup input-register" id="email-login-popup" placeholder="Password" required>
					<div class="checkboxes"><input type="checkbox" name="subscribe" class="check-box-register"><label for="subscribe">Subscribe to the Auction daily emails</label></div>
					<div class="checkboxes"><input type="checkbox" name="apply" class="check-box-register" required><label for="apply">I accept the <a href="" class="popup-a-href">Terms of Service</a> and <a href="" class="popup-a-href">Privacy Policy</a></label></div>
					<button type="submit" class="submit-popup">Sign up</button>
				</form>
				<div class="b-href-margin-popup" style="margin-bottom: 1rem;"><span style="color: red;" id="error-register"></span></div>
		</div></div>

		<div class="forgot-password">
			<div class="forgot-password-container">
				<a href="javascript://" id="close-forgot" class="close-popup">&times;</a>
				<div class="form-or-data">
					<form action="/forgot-password" method="POST" id="forgot-pass-form">
							{{ csrf_field() }}
							<label for="email-forgot" class="label-for-popup-input">Email address</label><br>
							<input type="email" name="email-forgot" class="input-popup input-register" id="email-login-popup" required>
							<button type="submit" class="submit-popup">Next</button>
					</form>
					<div class="b-href-margin-popup"><span style="color: red;" id="error-forgot"></span></div>
				</div>
				</div>
		</div>

		@section('content')

		@show


<footer>
			<div class="container href-container">
				<nav class="nav-footer">
					<a href='#' class="nav-footer-href">Home</a>
					<a href='#' class="nav-footer-href">About us</a>
					<a href='#' class="nav-footer-href">Buy a car</a>
					<a href='#' class="nav-footer-href">Support</a>
					<a href='#' class="nav-footer-href">Privacy policy</a>
				</nav>

				<div class="rights-footer"><span>@Copyright all rights reserved</span></div>
			</div>
		</footer>

		<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/global.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/ajax/ajax-search.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/ajax/register.js') }}"></script>
		@section('javascript')
		@show
	</body>
</html>