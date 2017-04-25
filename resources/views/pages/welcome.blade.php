@extends('main')

@section('content')

<section>
@include('partials/_topsection')

<div class="active-contributions-inquiries">
        <a id="active-contributions" href="{{url('/contributions')}}" type="button" class="btn btn-primary btn-lg" role="button">See All Contributions</a>
        <a id="active-inquiries" href="{{url('/inquiries')}}" type="button" class="btn btn-primary btn-lg" role="button">See All Inquiries</a>
</div>
<div class="welcome-board">
    <div class="row">
        <div class="col-md-6">
            <table class="table welcometable">
                 <thead>
                    <th class="col-xs-1">#</th>
                    <th class="col-xs-1">Title</th>
                    <th class="col-xs-1">Date</th>
                    <th class="col-xs-1">Skills offered</th>
                    <th class="col-xs-1">Location</th>
                    <th class="col-xs-1">No. of persons</th>
                </thead>
                <tbody>
                    @foreach ($contributions as $contribution)
                    <tr>
                        <th class="col-xs-1">{{ $contribution->id }}</th>
                        <td class="col-xs-3">{{ $contribution->title }}</td>
                        <td class="col-xs-2">{{ date('m j, Y') }}</td>
                        <td class="col-xs-3">{{ $contribution->skillsoffered }}</td>
                        <td class="col-xs-2">{{ $contribution->location }}</td>
                        <td class="col-xs-1">{{ $contribution->numberofpersonsoffered }}</td>
                        <td><a href="{{ route('contributions.show', $contribution->id) }}">View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table welcometable">
                <thead>
                    <th class="col-xs-1">#</th>
                    <th class="col-xs-1">Title</th>
                    <th class="col-xs-1">Date</th>
                    <th class="col-xs-1">Skills needed</th>
                    <th class="col-xs-1">Location</th>
                    <th class="col-xs-1">No. of persons</th>
                </thead>
                    <tbody>
                    @foreach ($inquiries as $inquiry)
                    <tr>
                        <td class="col-xs-1">{{ $inquiry->id }}</td>
                        <td class="col-xs-3">{{ $inquiry->title }}</td>
                        <td class="col-xs-2">{{ date('m j, Y') }}</td>
                        <td class="col-xs-3">{{ $inquiry->skillsneeded }}</td>
                        <td class="col-xs-2">{{ $inquiry->location }}</td>
                        <td class="col-xs-1">{{ $inquiry->numberofpersonsneeded }}</td>
                        <td><a href="{{ route('inquiries.show', $inquiry->id) }}">View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="welcome-images">
    <ul>
     <li><img src="images/help1.jpeg" alt="Helping hand"></li>
     <li><img src="images/help5.jpg" alt="Helping hand"></li>
     <li><img src="images/help3.jpg" alt="Helping hand"></li>
     <li><img src="images/help4.jpg" alt="Helping hand"></li>
     <li><img src="images/help2.jpg" alt="Helping hand"></li>
     <li><img src="images/help6.jpg" alt="Helping hand"></li>
     <li><img src="images/help7.png" alt="Helping hand"></li>
     <li><img src="images/help8.jpg" alt="Helping hand"></li>
     <li><img src="images/help9.jpg" alt="Helping hand"></li>
    </ul>
  </div> 
</div><!--end of container-->
</section>
@endsection
