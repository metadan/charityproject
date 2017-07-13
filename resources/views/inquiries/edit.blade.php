@extends('main')

@section('content')

<section id="top-border">
	<div class="container">
		<div class="row">
		{!! Form::model($inquiry, ['route' => ['inquiries.update', $inquiry->id], 'method'=>'PUT']) !!}
			<div class="col-md-6 edit">
				{{ Form::label('title', 'Title:') }}
				{{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

				{{ Form::label('description', "Description:", ["class" => 'form-spacing-top']) }}
				{{ Form::textarea('description', null, ["class" => 'form-control']) }}

				{{ Form::label('date', 'Date:') }}
				{{ Form::date('date', null, ["class" => 'form-control']) }}

				{{ Form::label('starttime', 'Start time:') }}
				{{ Form::time('starttime', null, ["class" => 'form-control']) }}

				{{ Form::label('endtime', 'End time:') }}
				{{ Form::time('endtime', null, ["class" => 'form-control']) }}
				<hr>

				{{Form::label(null, 'Skills needed: ') }}</br>
				@foreach($skillsavailable as $skill)
				{{ Form::label('skillsneeded', $skill->skill) }}
				{{ Form::radio('skillsneeded', $skill->id, ["class" => 'form-control']) }}
				@endforeach
				</br>
				<hr>

				{{Form::label(null, 'Location: ') }}</br>
				@foreach($locationsavailable as $location)
				{{ Form::label('location_id', $location->location) }}
				{{ Form::radio('location_id', $location->id, ["class" => 'form-control']) }}
				@endforeach
				</br>
				<hr>

				{{ Form::label('numberofpersonsneeded', 'Number of persons needed:') }}
				{{ Form::selectRange('numberofpersonsneeded', 1, 15, $inquiry -> numberofpersonsneeded, ["class" => 'form-control'])}}
			</div>

			<div class="col-md-4">
				<div class="well edit-info">
					<dl class="dl-horizontal ">
						<dt>Created At:</dt>
						<dd>{{ date('j M, Y H:i', strtotime($inquiry->created_at)) }}</dd>
					</dl> 

					<dl class="dl-horizontal">
						<dt>Last Updated:</dt>
						<dd>{{ date('j M, Y H:i', strtotime($inquiry->updated_at)) }}</dd>
					</dl>
				</div> 
				<hr>
				<div class="row">
					<div class="col-sm-6 edit-button">
						{!! Html::linkRoute('inquiries.show', 'Cancel Changes', array($inquiry->id), array('class'=>'btn btn-warning btn-block')) !!}
					</div>
					<div class="col-sm-6 edit-button">
						{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
					</div>
				</div>
			</div>	
		{!! Form::close() !!}	
		</div> <!--- end of row-->
	</div> <!--end of container-->
</section>

@endsection