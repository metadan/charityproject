@extends('main')

@section('content')

<section id="top-border">
	<div class="container">
		<div class="row">
			<div class="col-md-12 show-headline">
				<h1>My new Contribution</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 show">
				<h2> {{ $contribution->title }} </h1>
				<hr>
				<p> {{ $contribution->description }}</p>
				<hr>
				<p>Date: {{ $contribution->date}}</p>
				<p>Start time: {{ $contribution->starttime }} </p>
				<p>End time: {{ $contribution->endtime }} </p>
				<p>Location: {{ $contribution->location }}</p>
				<p>Skills offered: {{ $contribution->skillsoffered }}</p>
				<p>Number of persons offered: {{ $contribution->numberofpersonsoffered }} </p>
			</div>
			<div class="col-md-4 col-md-offset-1">
				<div class="well edit-info">
					<dl class="dl-horizontal">
						<dt>Created At:</dt>
						<dd>{{ date('M j, Y H:i', strtotime($contribution->created_at)) }}</dd>
					</dl>
					<dl class="dl-horizontal">
						<dt>Last Updated:</dt>
						<dd>{{ date('M j, Y H:i', strtotime($contribution->updated_at)) }}</dd>
					</dl>
				</div>
			</div>
			<hr>
			<div class="row">
				@can('update', $contribution)
					<div class="col-sm-6 show-button">
						{!! Html::linkRoute('contributions.edit', 'Edit', array($contribution->id), array('class'=>'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6 show-button">
						{!! Form::open(['route' => ['contributions.destroy', $contribution->id], 'method' => 'DELETE']) !!}

						{!! Form::submit('Delete',['class'=>'btn btn-danger btn-block']) !!}

						{!! Form::close() !!}
					</div>
					<div class="col-md-12 show-button">
						{{ Html::linkRoute('home.contributions', 'Go to My Contributions', [], ['class' => 'btn btn-warning btn-block btn-h1-spacing'])}}
					</div>
				@elsecan('view', $contribution)
					@can('hasAcceptedContribution', $contribution)
						<div class="col-sm-6 show-button">
							{!! Form::open(['route' => ['acceptcontributions.destroy', $contribution->id], 'method' => 'DELETE']) !!}
							{!! Form::submit('Cancel Acceptance of this Contribution', ['class'=>'btn btn-danger btn-block'])!!}

							{!! Form::close() !!}
						</div>
					@else
						<div class="col-sm-6 show-button">
							{!! Form::open(['route' => ['acceptcontributions.store'], 'method' => 'POST']) !!}
								<input value="{{$contribution->id}}" name="contribution_id" style="display: none;"> 
							{!! Form::submit('Accept Contribution', ['class'=>'btn btn-primary btn-block'])!!}

							{!! Form::close() !!}
						</div>
					@endcan
				@endcan
			</div>
		</div>
	</div>
</section>	


@endsection