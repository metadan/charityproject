@extends('main')

@section('content')

<section>
  <div class="find-contribution">
    <a href="loginsignup"><img src="images/find1.png" alt="Find icon">Find a contribution or inquiry </a>
    </div>
  <div class="create-contribution">
    <a href="loginsignup"><img src="images/create1.png" alt="Create icon">Create a contribution or inquiry</a>
  </div> 
    <div class="wrapper">
      <div class="search">
       <form id="search-box" action="">
          <input id="search-bar" type="text" placeholder="Search inquiries or contributions" required>
          <button id="search-button" type="submit"><i class="material-icons">search</i></button>
        </form>
      </div>
      <div class="secondary-content">
        <ul>
         <li><img src="images/help1.jpeg" alt="Helping hand"></li>
         <li><img src="images/help5.jpg" alt="Helping hand"></li>
         <li><img src="images/help3.jpg" alt="Helping hand"></li>
         <li><img src="images/help4.jpg" alt="Helping hand"></li>
         <li><img src="images/help2.jpg" alt="Helping hand"></li>
         <li><img src="images/help6.jpg" alt="Helping hand"></li>
         <li><img src="images/help7.png" alt="Helping hand"></li>
         <li><img src="images/help8.jpg" alt="Helping hand"></li>
         <li><img src="images/help9.jpg" alt="Helping hand"></li>
        </ul>
      </div> 
    </div>
</section>
@endsection
