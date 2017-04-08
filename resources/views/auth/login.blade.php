@extends('main')

@section('content')

<section id="top-border">
	<div class="wrapper">
	  <div class="login">
	      <h3>Logging in?</h3>
	        <form id="login-single-box" role="form" method="POST" action="{{ route('login') }}">
	        {{ csrf_field() }}

	        <input id="input-name" type="text" name="email" placeholder="Email" required>
	        <input id="input-password-right" name="password" type="password" placeholder="Password" required>
	        <input id="login-submit" type="submit" placeholder="Log in">
	        </form>
	  </div>
	</div>
</section>

@endsection