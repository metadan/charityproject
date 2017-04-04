@extends('main')

@section('content')

	<div>
		<h1>All Inquiries</h1>
	</div>

	<div>
		<table>
			<thead>
				<th>#</th>
				<th>Title</th>
				<th>Description</th>
				<th>Date</th>
				<th>Start time</th>
				<th>End time</th>
				<th>Skills needed</th>
				<th>Number of persons needed</th>
			</thead>
			<tbody>

			@foreach ($inquiries as $inquiry)

					<tr>
						<th>{{ $inquiry->id }}</th>
						<td>{{ $inquiry->title }}</td>
						<td>{{ $inquiry->description }}</td>
						<td>{{ date('m j, Y') }}</td>
						<td>{{ strtotime($inquiry->starttime) }}</td>
						<td>{{ strtotime($inquiry->endtime) }}</td>
						<td>{{ $inquiry->skillsneeded }}</td>
						<td>{{ $inquiry->numberofpersonsneeded }}</td>
						<td><a href="{{ route('inquiries.show', $inquiry->id) }}">View</a></td>
						<td><a href="{{ route('inquiries.edit', $inquiry->id) }}">Edit</a></td>
					</tr>

			@endforeach


			</tbody>
		</table>
	</div>



@endsection