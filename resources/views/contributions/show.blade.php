@extends('main')

@section('content')

	<div>
		<div>
			<h1>{{ $contribution->title }} </h1>
			<p>{{ $contribution->description }}</p>
		</div>
	</div>

	<div>
		<dl>
			<dt>Created At:</dt>
			<dd>{{ date('M j, Y H:i', strtotime($contribution->created_at)) }}</dd>
		</dl>

		<dl>
			<dt>Last Updated:</dt>
			<dd>{{ date('M m, Y H:i', strtotime($contribution->updated_at)) }}</dd>
		</dl>
	</div>

	<div>
		<div>
			{!!Html::linkRoute('contributions.edit', 'Edit', array($contribution->id))!!}
		</div>
		<div>
			{!!Html::linkRoute('contributions.destroy', 'Delete', array($contribution->id))!!}
		</div>
	</div>


@endsection