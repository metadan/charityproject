@extends('main')

@section('content')

<section id="top-border">
	<div class="wrapper">
	    <div class="create-an-inquiry">
	      <h3>Want to create an inquiry?</h3>
	      <h4>Please submit this form.</h4>
	        <form class="inquiry" method="POST" action="/inquiries" accept-charset="UTF-8">
	        	{{ csrf_field() }}
	        	<p>Title of your inquiry:</p>
		        <input class="title-needed" type="text" name="title" placeholder="Title" required>
		        <p>Short description of your inquiry:</p>
		        <input id="description-needed" type="text" name="description" placeholder="Description" required>
		        <p>Date of your inquiry:</p>
		        <input class="input-date" type="date" name="date" placeholder="Date" required>
		         <p>Start time of your inquiry:</p>
		        <input class="input-start-time" type="time" name="starttime" placeholder="Start time" required>
		        <p>End time of your inquiry:</p>
		        <input class="input-end-time" type="time" name="endtime" placeholder="End time" required>
		        <p>Skills needed for your inquiry:</p>
		        <input id="input-skills-needed" type="text" name="skillsneeded"  placeholder="Skills" required>
		        <p>Number of persons needed for the inquiry:</p>
		        <input class="input-number-persons" type="text" name="numberofpersonsneeded" placeholder="Number of persons" required>
		        <input id="inquiry-submit" type="submit" placeholder="Submit inquiry">
	        </form>
	    </div>
	  </div> 
	</div>
</section>

@endsection