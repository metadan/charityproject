@extends('main')

@section('content')

<section id="top-border">
  <div class="wrapper">
    <div class="login">
        <h3>Logging in?</h3>
          <form id="login-single-box" action="">
          <input id="input-name" type="text" placeholder="Username" required>
          <input id="input-password-right" type="text" placeholder="Password" required>
          <input id="login-submit" type="submit" placeholder="Log in">
          </form>
    </div>
  </div>
</section>

@endsection