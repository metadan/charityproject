@extends('main')

@section('content')

<section id="top-border">
        <!--<div class="orange-header-loggedin">-->
        </div>
        <div class="wrapper">
          <div class="search">
           <form id="search-box-logged" action="">
              <input id="search-bar" type="text" placeholder="Search inquiries or contributions" required>
              <button id="search-button" type="submit"><i class="material-icons">search</i></button>
            </form>
          </div>
          <div class="active-contributions-inquiries">
            <a id="active-contributions" href="#" type="button" class="btn btn-primary btn-lg active" role="button">My Contributions</a>
            <a id="active-inquiries" href="#" type="button" class="btn btn-default btn-lg active" role="button">My Inquiries</a>
          </div>
          <div class="user-board">
          <p> You are logged in! </p>
          </div>
          </section>

@endsection