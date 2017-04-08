@extends('main')

@section('content')

<section id="top-border">
	<div class="wrapper">
	  <div class="signup">
	    <h3> Do you want to sign up?</h3>
	        <form id="signup-single-box" method="POST" action="{{ route('register') }}" accept-charset="UTF-8">
	        	{{ csrf_field() }}
	        <input id="input-surname" type="text" name="name" placeholder="Name" required>
	        <input id="input-email" type="text" name="email" placeholder="Email" required>
	        <input id="input-password-left" type="password" name="password" placeholder="Password" required>
	        <input id="input-password-retype" type="password" name="password_confirmation" placeholder="Retype Password" required>
	        <input id="signup-submit" type="submit" placeholder="Sign up">
	        </form>
	        <a href="{{ url('/login') }}"> Already a member? Sign in here.</a>
	  </div>
	</div>
</section>

@endsection