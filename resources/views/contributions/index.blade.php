@extends('main')

@section('content')

	<div>
		<h1>All Contributions</h1>
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
				<th>Skills offered</th>
				<th>Number of persons offered</th>
			</thead>
			<tbody>

			@foreach ($contributions as $contribution)

					<tr>
						<th>{{ $contribution->id }}</th>
						<td>{{ $contribution->title }}</td>
						<td>{{ $contribution->description }}</td>
						<td>{{ date('m j, Y') }}</td>
						<td>{{ strtotime($contribution->starttime) }}</td>
						<td>{{ strtotime($contribution->endtime) }}</td>
						<td>{{ $contribution->skillsoffered }}</td>
						<td>{{ $contribution->numberofpersonsoffered }}</td>
						<td><a href="{{ route('contributions.show', $contribution->id) }}">View</a></td>
						<td><a href="{{ route('contributions.edit', $contribution->id) }}">Edit</a></td>
					</tr>

			@endforeach


			</tbody>
		</table>
	</div>



@endsection