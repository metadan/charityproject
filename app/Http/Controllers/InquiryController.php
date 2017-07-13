<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquiry;
use App\AcceptInquiry;
use Illuminate\Support\Facades\Auth;
use App\Skill;
use App\Location;
use Session;
use App\Profile;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //eloquent relationship between inquiries and skill, location tables in database - eager loading
        //create a variable and store all inquiries in the database that are not cancelled
        $inquiries = Inquiry::with('skill','location') 
                    ->where('cancelled', 0)
                    ->get();


        //return a view and pass in the above variable
        return view('inquiries.index')->with('inquiries', $inquiries);
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

        $skillsneeded = Skill::all();
        $locations = Location::all();

        return view('inquiries.create')->with('skillsneeded',$skillsneeded)->with('locations', $locations);
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
                    'skillsneeded' => 'required',
                    'location' => 'required',
                    'numberofpersonsneeded' => 'required'
                    ));

        //store in the database
            $inquiry = new Inquiry;

            $inquiry->title = $request->title;
            $inquiry->description = $request->description;
            $inquiry->date = $request->date;
            $inquiry->starttime = $request->starttime;
            $inquiry->endtime = $request->endtime;
            $inquiry->location_id = $request->location;
            $inquiry->skillsneeded = $request ->skillsneeded;
            $inquiry->numberofpersonsneeded = $request->numberofpersonsneeded;
            $inquiry->creator_id = Auth::user()->id;

            $inquiry->save();

        //flash message
            Session::flash('success', 'Inquiry was successfully saved!');

        //redirect to another page
            return redirect()->route('inquiries.show', ['id'=>$inquiry->id]);
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
        
        $inquiry = Inquiry::find($id);


        //acceptance of this inquiry
        $acceptedinquiries = AcceptInquiry::where('inquiry_id', $id)
                            ->get();

        //Log::info('Result from acceptedinquiries: '.$acceptedinquiries);

        $accepteduserids = [];

        foreach ($acceptedinquiries as $acceptedinquiry) {
            array_push($accepteduserids, $acceptedinquiry->user_id);
        }

        $acceptedusers = Profile::whereIn('user_id', $accepteduserids)
                                  ->get();



        return view('inquiries.show')->with('inquiry', $inquiry)->with('acceptedusers', $acceptedusers);
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

        $inquiry = Inquiry::find($id);
        $skillsavailable = Skill::all();
        $locationsavailable = Location::all();

        return view('inquiries.edit')->with('inquiry', $inquiry)->with('skillsavailable', $skillsavailable)->with('locationsavailable', $locationsavailable);
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
                    'skillsneeded' => 'required',
                    'location_id' => 'required',
                    'numberofpersonsneeded' => 'required'
                    ));

        $inquiry = Inquiry::find($id);

        $inquiry->title = $request->title;
        $inquiry->description = $request->description;
        $inquiry->date = $request->date;
        $inquiry->starttime = $request->starttime;
        $inquiry->endtime = $request->endtime;
        $inquiry->location_id = $request->location_id;
        $inquiry->skillsneeded = $request ->skillsneeded;
        $inquiry->numberofpersonsneeded = $request->numberofpersonsneeded;
        $inquiry->creator_id = Auth::user()->id;

        $inquiry->save();

        //flash message
        //Session::flash('success', 'Inquiry was successfully updated!');

        return redirect()->route('inquiries.show', ['id'=>$inquiry->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inquiry = Inquiry::find($id);

        $inquiry->cancelled = 1;

        $inquiry->save();
        
        return redirect()->route('inquiries.index');
    }
}
