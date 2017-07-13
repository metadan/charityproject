@extends('main')

@section('content')

<section id="top-border">
	<div class="container">	
		<div class="row" id="top-login">
	  		<div class="login" id="reset-single-box">
	      		<h3>Want to reset your password?</h3>
	        		<form role="form" method="POST" action="{{ route('password.email') }}" accept-charset="UTF-8">
	        			{{ csrf_field() }}
				    <input id="input-name" type="text" name="email" placeholder="Email" required>
				    <input id="login-submit" type="submit" placeholder="Log in">
				    </form>
	  		</div>
		</div>
	</div>
</section>



@endsection