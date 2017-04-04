@extends('main')

@section('content')

<section id="top-border">
	<div class="wrapper">
	    <div class="create-a-contribution">
	      <h3>Want to create a contribution?</h3>
	      <h4>Please submit this form.</h4>
	        <form class="contribution" method="POST" action="/contributions" accept-charset="UTF-8">
	        	{{ csrf_field() }}
        	<p>Title of your contribution:</p>
	        <input class="title-needed" type="text" name="title" placeholder="Title" required>
	        <p>Short description of your contribution:</p>
	        <input id="description-offered" type="text" name="description" placeholder="Description" required>
	        <p>Date of your contribution:</p>
	        <input class="input-date" type="date" name="date" placeholder="Date" required>
	        <p>Start time of your contribution:</p>
	        <input class="input-start-time" type="time" name="starttime" placeholder="Start time" required>
	        <p>End time of your contribution:</p>
	        <input class="input-end-time" type="time" name="endtime" placeholder="End time" required>
	        <p>Skills you offer for your contribution:</p>
	        <input id="input-skills-offered" type="text" name="skillsoffered" placeholder="Skills" required>
	        <p>Number of persons offered for the contribution:</p>
	        <input class="input-number-persons" type="text" name="numberofpersonsoffered" placeholder="Number of persons" required>
	        <input id="contribution-submit" type="submit" placeholder="Submit inquiry">
	        </form>
	    </div> 
	</div>
</section>

@endsection