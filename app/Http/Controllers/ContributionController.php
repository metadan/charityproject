<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contribution;
use App\AcceptContribution;
use Illuminate\Support\Facades\Auth;
use App\Skill;
use App\Location;
use Session;
use App\Profile;


class ContributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //eloquent relationship between contributions and skills, locations tables in database - eager loading
        //create a variable and store all the contributions in it from the database
        $contributions = Contribution::with('skill', 'location')
                        ->where('cancelled', 0)
                        ->get();


        //return a view and pass in the above variable
        return view('contributions.index')->with('contributions', $contributions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       if (Auth::guest()) {
            return redirect()->guest('register');
        }

        $skillsoffered = Skill::all();
        $locations = Location::all();

        return view('contributions.create')->with('skillsoffered', $skillsoffered)->with('locations', $locations); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validate the data
        $this->validate($request, array(
                'title' => 'required|max:150',
                'description' => 'required|max:255',
                'date' => 'required',
                'starttime' => 'required',
                'endtime' => 'required',
                'skillsoffered' => 'required',
                'location' => 'required',
                'numberofpersonsoffered' => 'required'
                ));

        //store the data in database
        $contribution = new Contribution;

            $contribution->title = $request->title;
            $contribution->description = $request->description;
            $contribution->date = $request->date;
            $contribution->starttime = $request->starttime;
            $contribution->endtime = $request->endtime;
            $contribution->location_id = $request->location;
            $contribution->skillsoffered = $request->skillsoffered;
            $contribution->numberofpersonsoffered = $request->numberofpersonsoffered;
            $contribution->creator_id = Auth::user()->id;

            $contribution->save();

        //flash message
        Session::flash('success', 'Contribution was successfully saved!');

        //redirect to another page
            return redirect()->route('contributions.show', ['id'=>$contribution->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::guest()) {
            return redirect()->guest('register');
        }
        
        $contribution = Contribution::find($id);

        //acceptance of this contribution

        $acceptedcontributions = AcceptContribution::where('contribution_id', $id)
                                ->get();

        $accepteduserids = [];

        foreach ($acceptedcontributions as $acceptedcontribution) {
                array_push($accepteduserids, $acceptedcontribution->user_id);
        }

        $acceptedusers = Profile::whereIn('user_id', $accepteduserids)
                                ->get();


        return view('contributions.show')->with('contribution', $contribution)->with('acceptedusers', $acceptedusers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::guest()) {
            return redirect()->guest('register');
        }

        $contribution = Contribution::find($id);
        $skillsavailable = Skill::all();
        $locationsavailable = Location::all();

        return view('contributions.edit')->with('contribution', $contribution)->with('skillsavailable', $skillsavailable)->with('locationsavailable', $locationsavailable);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, array(
                'title' => 'required|max:150',
                'description' => 'required|max:255',
                'date' => 'required',
                'starttime' => 'required',
                'endtime' => 'required',
                'skillsoffered' => 'required',
                'location_id' =>'required',
                'numberofpersonsoffered' => 'required'
                ));

        $contribution = Contribution::find($id);

        $contribution->title = $request->title;
        $contribution->description = $request->description;
        $contribution->date = $request->date;
        $contribution->starttime = $request->starttime;
        $contribution->endtime = $request->endtime;
        $contribution->skillsoffered = $request->skillsoffered;
        $contribution->location_id = $request->location_id;
        $contribution->numberofpersonsoffered = $request->numberofpersonsoffered;
        $contribution->creator_id = Auth::user()->id;

        $contribution->save();

        //flash message

        return redirect()->route('contributions.show', ['id'=>$contribution->id]);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contribution = Contribution::find($id);

        $contribution->cancelled = 1;

        $contribution->save();

        return redirect()->route('contributions.index');

    }
}
