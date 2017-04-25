@extends('main')

@section('content')

<section id="top-border">
	<div class="container">
		<div class="row">
			<div class="col-md-12 show-headline">
				<h1>My new Inquiry</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 show">
				<h2> {{ $inquiry->title }} </h1>
				<hr>
				<p> {{ $inquiry->description }}</p>
				<hr>
				<p>Date: {{ $inquiry->date}}</p>
				<p>Start time: {{ $inquiry->starttime }} </p>
				<p>End time: {{ $inquiry->endtime }} </p>
				<p>Location: {{ $inquiry->location }}</p>
				<p>Skills needed: {{ $inquiry->skillsneeded }}</p>
				<p>Number of persons needed: {{ $inquiry->numberofpersonsneeded }} </p>
			</div>
			<div class="col-md-4 col-md-offset-1">
				<div class="well edit-info">
					<dl class="dl-horizontal">
						<dt>Created At:</dt>
						<dd>{{ date('M j, Y H:i', strtotime($inquiry->created_at)) }}</dd>
					</dl>
					<dl class="dl-horizontal">
						<dt>Last Updated:</dt>
						<dd>{{ date('M j, Y H:i', strtotime($inquiry->updated_at)) }}</dd>
					</dl>
				</div>
			</div>
			<hr>
			<div class="row">
				@can('update', $inquiry)
					<div class="col-sm-6 show-button">
						{!! Html::linkRoute('inquiries.edit', 'Edit', array($inquiry->id), array('class'=>'btn btn-success btn-block')) !!}
					</div>
					<div class="col-sm-6 show-button">
						{!! Form::open(['route' => ['inquiries.destroy', $inquiry->id], 'method' => 'DELETE']) !!}

						{!! Form::submit('Delete',['class'=>'btn btn-danger btn-block']) !!}

						{!! Form::close() !!}
					</div>
					<div class="col-md-12 show-button">
						{{ Html::linkRoute('home.inquiries', 'Go to My Inquiries', [], ['class' => 'btn btn-warning btn-block btn-h1-spacing'])}}
					</div>
				@elsecan('view', $inquiry)
					@can('hasAcceptedInquiry', $inquiry)
						<div class="col-sm-6 show-button">
							{!! Form::open(['route' => ['acceptinquiries.destroy', $inquiry->id], 'method' => 'DELETE']) !!}
							{!! Form::submit('Cancel Acceptance of this Inquiry', ['class'=>'btn btn-danger btn-block'])!!}

							{!! Form::close() !!}
						</div>
					@else
						<div class="col-sm-6 show-button">
							{!! Form::open(['route' => ['acceptinquiries.store'], 'method' => 'POST']) !!}
								<input value="{{$inquiry->id}}" name="inquiry_id" style="display: none;"> 
							{!! Form::submit('Accept Inquiry', ['class'=>'btn btn-primary btn-block'])!!}

							{!! Form::close() !!}
						</div>
					@endcan
				@endcan
			</div>
		</div>
	</div> <!--end of container-->
</section>	


@endsection