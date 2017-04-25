@extends('main')

@section('content')

<section>

@include('partials/_topsection')

<div class="active-contributions-inquiries">
       	<a id="active-contributions" href="{{url('/contributions')}}" type="button" class="btn btn-primary btn-lg" role="button">See All Contributions</a>
        <a id="active-inquiries" href="{{url('/inquiries')}}" type="button" class="btn btn-primary btn-lg active" role="button">See All Inquiries</a>
</div>
    <div class="user-board">
    	<table class="table">
			<thead>
				<th class="col-xs-1">#</th>
				<th class="col-xs-1">Title</th>
				<th class="col-xs-1">Date</th>
				<th class="col-xs-1">Start time</th>
				<th class="col-xs-1">End time</th>
				<th class="col-xs-2">Skills needed</th>
				<th class="col-xs-2">Location</th>
				<th class="col-xs-2">No. persons needed</th>
			</thead>
			<tbody>
			@foreach ($inquiries as $inquiry)
				<tr>
					<td class="col-xs-1">{{ $inquiry->id }}</td>
					<td class="col-xs-1">{{ $inquiry->title }}</td>
					<td class="col-xs-1">{{ date('m j, Y') }}</td>
					<td class="col-xs-1">{{ strtotime($inquiry->starttime) }}</td>
					<td class="col-xs-1">{{ strtotime($inquiry->endtime) }}</td>
					<td class="col-xs-2">{{ $inquiry->skill->skill }}</td>
					<td class="col-xs-2">{{ $inquiry->location }}</td>
					<td class="col-xs-1">{{ $inquiry->numberofpersonsneeded }}</td>
					<td><a href="{{ route('inquiries.show', $inquiry->id) }}">View</a></td>
					@can('update', $inquiry)
					<td><a href="{{ route('inquiries.edit', $inquiry->id) }}">Edit</a></td>
					@endcan
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	</div><!--end of container-->
</section>



@endsection