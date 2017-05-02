@extends('main')

@section('content')

<section>

@include('partials/_topsection')
	<div class="active-contributions-inquiries">
	    <a id="active-contributions" href="{{url('home/contributions')}}" type="button" class="btn btn-primary btn-lg active" role="button">My Contributions</a>
	    <a id="active-inquiries" href="{{url('home/inquiries')}}" type="button" class="btn btn-primary btn-lg" role="button">My Inquiries</a>
	</div>
	<div class="user-inquiries-contributions-table">
		<h3>Contributions that I created</h3>
	    <table class="table hometable">
			<thead>
				<th class="col-xs-1">#</th>
				<th class="col-xs-1">Title</th>
				<th class="col-xs-1">Date</th>
				<th class="col-xs-1">Start time</th>
				<th class="col-xs-1">End time</th>
				<th class="col-xs-2">Skills offered</th>
				<th class="col-xs-2">Location</th>
				<th class="col-xs-2">No. of persons offered</th>
			</thead>
			<tbody>
				@foreach ($contributions as $contribution)

						<tr>
							<td class="col-xs-1">{{ $contribution->id }}</td>
							<td class="col-xs-1">{{ $contribution->title }}</td>
							<td class="col-xs-1">{{ date('m j, Y') }}</td>
							<td class="col-xs-1">{{ $contribution->starttime }}</td>
							<td class="col-xs-1">{{ $contribution->endtime }}</td>
							<td class="col-xs-2">{{ $contribution->skill->skill }}</td>
							<td class="col-xs-4">{{ $contribution->location->location }}</td>
							<td class="col-xs-1">{{ $contribution->numberofpersonsoffered }}</td>
							<td><a href="{{ route('contributions.show', $contribution->id) }}">View</a></td>
							@can('update', $contribution)
							<td><a href="{{ route('contributions.edit', $contribution->id) }}">Edit</a></td>
							@endcan
						</tr>
				@endforeach
			</tbody>
		</table>
		<h3>Accepted Contributions</h3>
		<table class="table hometable">
			<thead>
				<th class="col-xs-1">#</th>
				<th class="col-xs-1">Title</th>
				<th class="col-xs-1">Date</th>
				<th class="col-xs-1">Start time</th>
				<th class="col-xs-1">End time</th>
				<th class="col-xs-2">Skills offered</th>
				<th class="col-xs-2">Location</th>
				<th class="col-xs-2">No. of persons offered</th>
			</thead>
			<tbody>
				@foreach ($acceptedContributions as $contribution)
						<tr>
							<th class="col-xs-1">{{ $contribution->id }}</th>
							<td class="col-xs-1">{{ $contribution->title }}</td>
							<td class="col-xs-1">{{ date('m j, Y') }}</td>
							<td class="col-xs-1">{{ strtotime($contribution->starttime) }}</td>
							<td class="col-xs-1">{{ strtotime($contribution->endtime) }}</td>
							<td class="col-xs-2">{{ $contribution->skill->skill }}</td>
							<td class="col-xs-3">{{ $contribution->location->location }}</td>
							<td class="col-xs-1">{{ $contribution->numberofpersonsoffered }}</td>
							<td><a href="{{ route('contributions.show', $contribution->id) }}">View</a></td>
							@can('update', $contribution)
							<td><a href="{{ route('contributions.edit', $contribution->id) }}">Edit</a></td>
							@endcan
						</tr>
				@endforeach
				</tbody>
		</table>
	</div>
	</div><!--end of container-->
</section>

@endsection