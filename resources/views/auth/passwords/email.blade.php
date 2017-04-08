@extends('main')

@section('content')

<section id="top-border">
	<div class="wrapper">
	  <div class="login">
	      <h3>Want to reset your password?</h3>
	        <form role="form" method="POST" action="{{ route('password.email') }}">
	        {{ csrf_field() }}

	        <input id="input-name" type="text" name="email" placeholder="Email" required>
	        <input id="login-submit" type="submit" placeholder="Log in">
	        </form>
	  </div>
	</div>
</section>



@endsection