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
		              <a href="mailto:{{ $user->email }}"> {{ $user->email }} </a>
		              <p> {{ $profile->description }}</p>
		             </div>
	          	</div>
	           		<div class="col-md-4 col-md-offset-2">
		           		<div class="profile-info">
	   			            <p>Total created inquiries:  {{ $createdinquiries }}</p>
							<p>Total accepted inquiries:  {{ $acceptedinquiries }}</p>
							<p>Total created contributions:  {{ $createdcontributions }}</p>
							<p>Total accepted contributions:  {{ $acceptedcontributions }}</p>
		           		</div>
	          		</div>
	        </div><!--end of row-->
	    <div class="row">
	    	<div class="col-md-3 user-created">
            	<p>User since: {{ date('M j, Y H:i', strtotime( $user->created_at)) }}</p>
            </div>
            <div class="col-md-3 user-skills">
            	<p>Main skill:  {{ $profile->skill->skill }}</p>
            </div>
            <div class="col-md-1 profile-button">
             @can('update', $profile)
						{!! Html::linkRoute('profile.edit', 'Edit Profile', array($profile->id), array('class'=>'btn btn-primary')) !!}
			@endcan
			</div>
			<div class="col-md-2 profile-button">
			@can('delete', $profile)
						{!! Form::open(['route' => ['profile.destroy', $profile->id], 'method' => 'DELETE']) !!}

						{!! Form::submit('Delete Profile',['class'=>'btn btn-danger']) !!}

						{!! Form::close() !!}
			@endcan
			</div>
			<div class="col-md-2 profile-button">
            	<a type="button" class="btn btn-success" href="{{ route('home') }}">Go back to My Home</a>
            </div>
      </div><!--end of row-->
  </div> <!--end of container-->
</section>


@endsection