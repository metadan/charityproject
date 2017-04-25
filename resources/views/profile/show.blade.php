@extends('main')

@section('content')

<section id="top-border">
	<div class="container">
		<div class="row">
			<div class="profile-board">
	        	<div class="row">
	          		<div class="col-md-3">
	          			<div class="user-image-box">
	              			<img src="/images/blank.picture.png" class="img-responsive" alt="Responsive image">
	            		</div>
	          		</div>
	          	<div class="col-md-3">
	          		<div class="profile-basic">
		              <h3>{{ $profile->username }} </h3>
		              <p> {{ $profile->description }}</p>
		             </div>
	          	</div>
	           		<div class="col-md-3 col-md-offset-2">
		           		<div class="profile-info">
	   			            <p>Total created inquiries:</p>
							<p>Total accepted inquiries:</p>
							<p>Total created contributions:</p>
							<p>Total accepted contributions:</p>
		           		</div>
	          		</div>
	        </div><!--end of row-->
	    <div class="row">
	    	<div class="col-md-3 user-created">
            	<p>User since:</p>
            </div>
            <div class="col-md-3 user-skills">
            	<p>Main skill: </p>
            </div>
            <div class="col-md-1 profile-button">
						{!! Html::linkRoute('profile.edit', 'Edit Profile', array($profile->id), array('class'=>'btn btn-primary')) !!}
			</div>
			<div class="col-md-2 profile-button">
						{!! Form::open(['route' => ['profile.destroy', $profile->id], 'method' => 'DELETE']) !!}

						{!! Form::submit('Delete Profile',['class'=>'btn btn-danger']) !!}

						{!! Form::close() !!}
			</div>
			<div class="col-md-2 profile-button">
            	<a type="button" class="btn btn-success" href="{{ route('home') }}">Go back to My Home</a>
            </div>
      </div><!--end of row-->
  </div> <!--end of container-->
</section>


@endsection