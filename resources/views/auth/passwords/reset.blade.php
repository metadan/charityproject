@extends('main')

@section('content')

<section id="top-border">
	<div class="container">
		<div class="row" id="top-login">
	  		<div class="login" id="reset-single-box">
	      		<h3>Want to reset your password?</h3>
	        		<form role="form" method="POST" action="{{ route('password.request') }}">
	        			{{ csrf_field() }}
	      			<input type="hidden" name="token" value="{{ $token }}">
	      			<input id="input-email" type="text" name="email" placeholder="Email" required>
	       		 	<input id="input-password-left" type="password" name="password" placeholder="Password" required>
	        		<input id="input-password-retype" type="password" name="password_confirmation" placeholder="Retype Password" required>
	        		<input id="signup-submit" type="submit" placeholder="Submit">
	        		</form>
	    	</div>
    	</div>
    </div>
</section>


@endsection