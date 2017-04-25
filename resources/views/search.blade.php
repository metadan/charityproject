@extends('main')

@section('content')

<section>

@include('partials/_topsection')

	<div class="active-contributions-inquiries">
	        <a id="active-contributions" href="{{url('/contributions')}}" type="button" class="btn btn-primary btn-lg" role="button">See All Contributions</a>
	        <a id="active-inquiries" href="{{url('/inquiries')}}" type="button" class="btn btn-primary btn-lg" role="button">See All Inquiries</a>
	</div>
	<div class="search-board">
		@if ($type === 'inquiries')
		<h3>Searched Inquiries</h3>
			<table class="table searchtable">
	        	<thead>
				<th class="col-xs-1">#</th>
				<th class="col-xs-1">Title</th>
				<th class="col-xs-3">Description</th>
				<th class="col-xs-1">Date</th>
				<th class="col-xs-1">Start time</th>
				<th class="col-xs-1">End time</th>
				<th class="col-xs-2">Skills offered</th>
				<th class="col-xs-3">No. of persons offered</th>
				</thead>
				<tbody>
					@foreach ($data as $inquiry)
							<tr>
								<td class="col-xs-1">{{ $inquiry->id }}</td>
								<td class="col-xs-1">{{ $inquiry->title }}</td>
								<td class="col-xs-2">{{ $inquiry->description }}</td>
								<td class="col-xs-1">{{ date('m j, Y') }}</td>
								<td class="col-xs-1">{{ strtotime($inquiry->starttime) }}</td>
								<td class="col-xs-1">{{ strtotime($inquiry->endtime) }}</td>
								<td class="col-xs-2">{{ $inquiry->skillsneeded }}</td>
								<td class="col-xs-1">{{ $inquiry->numberofpersonsneeded }}</td>
									<td><a href="{{ route('inquiries.show', $inquiry->id) }}">View</a></td>
								@can('update', $inquiry)
									<td><a href="{{ route('inquiries.edit', $inquiry->id) }}">Edit</a></td>
								@endcan
							</tr>
					@endforeach
				</tbody>
			</table>
		@elseif($type === 'contributions')
		<h3>Searched Contributions</h3>
	        <table class="table searchtable">
	        	<thead>
				<th class="col-xs-1">#</th>
				<th class="col-xs-1">Title</th>
				<th class="col-xs-3">Description</th>
				<th class="col-xs-1">Date</th>
				<th class="col-xs-1">Start time</th>
				<th class="col-xs-1">End time</th>
				<th class="col-xs-2">Skills offered</th>
				<th class="col-xs-3">No. of persons offered</th>
				</thead>
				<tbody>
					@foreach ($data as $contribution)
								<tr>
									<td class="col-xs-1">{{ $contribution->id }}</td>
									<td class="col-xs-1">{{ $contribution->title }}</td>
									<td class="col-xs-2">{{ $contribution->description }}</td>
									<td class="col-xs-1">{{ date('m j, Y') }}</td>
									<td class="col-xs-1">{{ strtotime($contribution->starttime) }}</td>
									<td class="col-xs-1">{{ strtotime($contribution->endtime) }}</td>
									<td class="col-xs-2">{{ $contribution->skillsoffered }}</td>
									<td class="col-xs-1">{{ $contribution->numberofpersonsoffered }}</td>
										<td><a href="{{ route('contributions.show', $contribution->id) }}">View</a></td>
									@can('update', $contribution)
										<td><a href="{{ route('contributions.edit', $contribution->id) }}">Edit</a></td>
									@endcan
								</tr>
					@endforeach
				</tbody>
			</table>
		@endif
	</div>
</div> <!--end of row-->
</div> <!--end of container-->
</section>

@endsection