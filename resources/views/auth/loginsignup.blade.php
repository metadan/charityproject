@extends('main')

@section('content')

<section id="top-border">
	<div class="wrapper">
	  <div class="login-signup">
	    <div class="login-left">
	      <h3 class="login-signup-headline">Already a member? Here is the login form:</h3>
	        <form id="login-box" action="">
	        <input id="input-name" type="text" placeholder="Username" required>
	        <input id="input-password-right" type="text" placeholder="Password" required>
	        <input id="login-submit" type="submit" placeholder="Log in">
	        </form>
	    </div>
	    <div class="signup-right">
	      <h3 class="login-signup-headline"> Not a member? Here is the signup form:</h3>
	        <form id="signup-box" action="">
	        <input id="input-firstname" type="text" placeholder="Firstname" required>
	        <input id="input-surname" type="text" placeholder="Surname" required>
	        <input id="input-email" type="text" placeholder="Email" required>
	        <input id="input-password-left" type="text" placeholder="Password" required>
	        <input id="input-password-retype" type="text" placeholder="Retype Password" required>
	        <input id="signup-submit" type="submit" placeholder="Sign up">
	        </form>
	    </div>
	  </div> 
	</div>
</section>

@endsection