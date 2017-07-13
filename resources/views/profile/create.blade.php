@extends('main')

@section('content')

<section id="top-border">
	<div class="container">
	    <div class="create-a-profile">
	      <h3>Please fill out this information for your profile.</h3>
	        <form method="POST" action="/profile" accept-charset="UTF-8">
	        	<div class="form-group">
	        		{{ csrf_field() }}
	        		<p>Username:</p>	
	        		<input class="title-needed" type="text" name="username" placeholder="Username" required>
		        </div>
		        <div class="form-group">
		        	<p>Please give us a description of yourself:</p>
		        		<input id="description-needed" type="textarea" name="description" placeholder="Description" required>
		        </div>
		       	<div class="form-group">
					<p>What is your location?</p>
						<select name="location" required>
						<option value="">Select location</option>
						@foreach ($locations as $location)
								<option value="{{ $location->id }}">{{$location->location}}</option>
						@endforeach
						</select>
				</div>
		        <div class="form-group">
					<p>What is your main skill?</p>
						<select name="skills" required="">
						<option value="">Select skill</option>
						@foreach ($skills as $skill)
								<option value="{{ $skill->id }}">{{$skill->skill}}</option>
						@endforeach
						</select>
		        </div>
	        	<input id="contribution-submit" type="submit" placeholder="Submit Profile">
	        </form>
	    </div> 
	</div> <!--end of container-->
</section>

@endsection