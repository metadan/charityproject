@extends('main')

@section('content')

<section id="top-border">
	<div class="container">
	  	<div class="row" id="top-login">
	  		<div class="login" id="login-single-box" >
		    	<h3>Logging in?</h3>
			    	<form role="form" method="POST" action="{{ route('login') }}" accept-charset="UTF-8">
			        	{{ csrf_field() }}
			        <input id="input-name" type="text" name="email" placeholder="Email" required>
			        <input id="input-password-right" name="password" type="password" placeholder="Password" required>
			        <input id="login-submit" type="submit" placeholder="Log in">
			        </form>
			        <hr>
			    	<a id="password-reset" href="{{ route('password.request') }}">Forgot Your Password?</a>
	  		</div>
		</div>
	</div>
</section>

@endsection