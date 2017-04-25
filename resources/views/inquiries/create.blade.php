@extends('main')

@section('content')

<section id="top-border">
	<div class="container">
	    <div class="create-an-inquiry">
	      <h3>Want to create an inquiry?</h3>
	      <h4>Please submit this form.</h4>
	        <form class="inquiry form-horizontal" method="POST" action="/inquiries" accept-charset="UTF-8">
	        	<div class="form-group">
	        	{{ csrf_field() }}
	        		<p>Title of your inquiry</p>	
	        		<input class="title-needed" type="text" name="title" placeholder="Title" required>
		        </div>
		        <div class="form-group">
		        	<p>Short description of your inquiry:</p>
		        		<input id="description-needed" type="textarea" name="description" placeholder="Description" required>
		        </div>
		       	<div class="form-group">
					<p>Location of your inquiry:</p>
						<select name="location" required="">
						<option value="">Select location</option>
						@foreach ($locations as $location)
								<option value="{{ $location->id }}">{{$location->location}}</option>
						@endforeach
						</select>
		        </div>
		        <div class="form-group">
		        	<p>Date of your inquiry:</p>
		        		<input class="input-date" type="date" name="date" placeholder="Date" required>
		        </div>
		         <div class="form-group">
		         	<p>Start time of your inquiry:</p>
		        		<input class="input-start-time" type="time" name="starttime" placeholder="Start time" required>
		        </div>
		        <div class="form-group">
		       		<p>End time of your inquiry:</p>
		        		<input class="input-end-time" type="time" name="endtime" placeholder="End time" required>
		        </div>
		        <div class="form-group">
					<p>Skills needed for your inquiry:</p>
						<select name="skillsneeded" required="">
						<option value="">Select skill</option>
						@foreach ($skillsneeded as $skill)
								<option value="{{ $skill->id }}">{{$skill->skill}}</option>
						@endforeach
						</select>
		        </div>
		        <div class="form-group">
		        	<p>Number of persons needed for the inquiry:</p>
		        		<select name="numberofpersonsneeded">
			        		@for ($i = 1; $i < 16; $i++)
							    <option>{{ $i }}</option>
							@endfor
						</select>
		        </div>
		        <input id="inquiry-submit" type="submit" placeholder="Submit inquiry">
	        </form>
	    </div>
	  </div> <!--end of container-->
</section>

@endsection