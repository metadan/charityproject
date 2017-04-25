@extends('main')

@section('content')

<section id="top-border">
	<div class="container">
		<div class="row">
		{!! Form::model($profile, ['route' => ['profile.update', $profile->id], 'method'=>'PUT']) !!}
			<div class="col-md-6 edit-profile">
				{{ Form::label('username', 'Username:') }}
				{{ Form::text('username', null, ["class" => 'form-control input-lg']) }}

				{{ Form::label('description', "Description:", ["class" => 'form-spacing-top']) }}
				{{ Form::textarea('description', null, ["class" => 'form-control']) }}

				{{Form::label(null, 'Main skills: ') }}
				</br>
				@foreach($skills as $skill)
				{{ Form::label('skills', $skill->skill) }}
				{{ Form::radio('skills', $skill->id, ["class" => 'form-control']) }}
				@endforeach
				</br>
				{{Form::label(null, 'Location: ') }}
				</br>
				@foreach($locations as $location)
				{{ Form::label('locations', $location->location) }}
				{{ Form::radio('locations', $location->id, ["class" => 'form-control']) }}
				@endforeach
			</div>

			<div class="col-md-4">
				<div class="well edit-info">
					<dl class="dl-horizontal">
						<dt>Created At:</dt>
						<dd>{{ date('j M, Y H:i', strtotime($profile->created_at)) }}</dd>
					</dl> 

					<dl class="dl-horizontal">
						<dt>Last Updated:</dt>
						<dd>{{ date('j M, Y H:i', strtotime($profile->updated_at)) }}</dd>
					</dl>
				</div> 
				<hr>
				<div class="row">
					<div class="col-sm-6 edit-button">
						{!! Html::linkRoute('profile.show', 'Cancel', array($profile->id), array('class'=>'btn btn-warning btn-block')) !!}
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