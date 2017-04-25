@extends('main')

@section('content')

<section>

  @include('partials/_topsection')

    <div class="active-contributions-inquiries">
        <a id="active-contributions" href="home/contributions" type="button" class="btn btn-primary btn-lg" role="button">My Contributions</a>
        <a id="active-inquiries" href="home/inquiries" type="button" class="btn btn-primary btn-lg" role="button">My Inquiries</a>
    </div>
      <div class="user-board">
        <div class="row">
          <div class="col-md-3">
            <div class="user-image-box">
              <img src="images/blank.picture.png" class="img-responsive" alt="Responsive image">
              <input type="file" name="" id="camerainput1" accept="image/*" capture>
            </div>
          </div>
          <div class="col-md-3 user-info">
            <p>Total created inquiries: {{ $createdinquiries }}</p>
            <p>Total accepted inquiries: {{ $acceptedinquiries }}</p>
            <p>Total created contributions: {{ $createdcontributions }}</p>
            <p>Total accepted contributions: {{ $acceptedcontributions }}</p>
          </div>
          <div class="col-md-6">
            <div class="greeting">
              <h3>Welcome, {{Auth::user()->name}} !</h3>
            </div>
          </div>
          <div class="col-md-3 user-since">
            <p>User since:</p>
            <p>{{ date('M j, Y H:i', strtotime(Auth::user()->created_at)) }}</p>
            <a id="createprofile-button" type="button" class="btn btn-success btn-lg" href="{{ route('profile.create') }}">Create my Profile</a>
          </div>

        </div><!--end of row-->
      </div>
  </div> <!--end of container-->
</section>

@endsection