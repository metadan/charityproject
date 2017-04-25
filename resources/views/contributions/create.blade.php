@extends('main')

@section('content')

<section id="top-border">
	<div class="container">
	    <div class="create-a-contribution">
	      <h3>Want to create a contribution?</h3>
	      <h4>Please submit this form.</h4>
	        <form class="contribution form-horizontal" method="POST" action="/contributions" accept-charset="UTF-8">
	        	<div class="form-group">
	        	{{ csrf_field() }}
	        		<p>Title of your contribution:</p>	
	        		<input class="title-needed" type="text" name="title" placeholder="Title" required>
		        </div>
		        <div class="form-group">
		        	<p>Short description of your contribution:</p>
		        		<input id="description-needed" type="textarea" name="description" placeholder="Description" required>
		        </div>
		       	<div class="form-group">
					<p>Location of your contribution:</p>
						<select name="location" required="">
						<option value="">Select location</option>
						@foreach ($locations as $location)
								<option value="{{ $location->id }}">{{$location->location}}</option>
						@endforeach
						</select>
				</div>
		        <div class="form-group">
		        	<p>Date of your contribution:</p>
		        		<input class="input-date" type="date" name="date" placeholder="Date" required>
		        </div>
		         <div class="form-group">
		         	<p>Start time of your contribution:</p>
		        		<input class="input-start-time" type="time" name="starttime" placeholder="Start time" required>
		        </div>
		        <div class="form-group">
		       		<p>End time of your contribution:</p>
		        		<input class="input-end-time" type="time" name="endtime" placeholder="End time" required>
		        </div>
		        <div class="form-group">
					<p>Skills offered for your inquiry:</p>
						<select name="skillsoffered" required="">
						<option value="">Select skill</option>
						@foreach ($skillsoffered as $skill)
								<option value="{{ $skill->id }}">{{$skill->skill}}</option>
						@endforeach
						</select>
		        </div>
		        <div class="form-group">
		        	<p>Number of persons offered for the contribution:</p>
		        		<select name="numberofpersonsoffered">
							@for($i = 1; $i < 16; $i++)
								<option>{{ $i }}</option>
							@endfor
						</select>
		        </div>
	        	<input id="contribution-submit" type="submit" placeholder="Submit inquiry">
	        </form>
	    </div> 
	</div> <!--end of container-->
</section>

@endsection