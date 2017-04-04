@extends('main')

@section('content')

	<div>
		<div>
			<h1>{{ $inquiry->title }} </h1>
			<p>{{ $inquiry->description }}</p>
		</div>
	</div>

	<div>
		<dl>
			<dt>Created At:</dt>
			<dd>{{ date('M j, Y H:i', strtotime($inquiry->created_at)) }}</dd>
		</dl>

		<dl>
			<dt>Last Updated:</dt>
			<dd>{{ date('M j, Y H:i', strtotime($inquiry->updated_at)) }}</dd>
		</dl>
	</div>

	<div>
		<div>
			{!! Html::linkRoute('inquiries.edit', 'Edit', array($inquiry->id)) !!}
		</div>
		<div>
			{!!Html::linkRoute('inquiries.destroy', 'Delete', array($inquiry->id))!!}
		</div>
	</div>


@endsection