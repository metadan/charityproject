@extends('main')

@section('content')

<section id="top-border">
	<div class="wrapper">
	  <div class="signup">
	    <h3> Do you want to sign up?</h3>
	        <form id="signup-single-box" action="">
	        <input id="input-firstname" type="text" placeholder="Firstname" required>
	        <input id="input-surname" type="text" placeholder="Surname" required>
	        <input id="input-email" type="text" placeholder="Email" required>
	        <input id="input-password-left" type="text" placeholder="Password" required>
	        <input id="input-password-retype" type="text" placeholder="Retype Password" required>
	        <input id="signup-submit" type="submit" placeholder="Sign up">
	        </form>
	  </div>
	</div>
</section>

@endsection