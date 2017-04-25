<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Skill;
use App\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profileId = Profile::all();

        return view('profile.index')->with('profileid', $profileId->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::all();
        $locations = Location::all();

        return view('profile.create')->with('skills', $skills)->with('locations', $locations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
                'username' => 'required|max:150',
                'description' => 'required|max:255',
                'skills' => 'required',
                'location' => 'required',
                ));

        //store the data in database
        $profile = new Profile;

            $profile->username = $request->username;
            $profile->description = $request->description;
            $profile->skills = $request->skills;
            $profile->location = $request->location;
            $profile->user_id= Auth::user()->id;

            $profile->save();

            Log::info('Result from profile: '.$profile);

        //flash message
        Session::flash('success', 'Profile was successfully saved!');

        //redirect to another page
            return redirect()->route('profile.show', ['id'=>$profile->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::find($id);

        return view('profile.show')->with('profile', $profile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);
        $skills = Skill::all();
        $locations = Location::all();

        return view('profile.edit')->with('profile', $profile)->with('skills', $skills)->with('locations', $locations);
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
                'username' => 'required|max:150',
                'description' => 'required|max:255',
                'skills' => 'required',
                'location' => 'required',
                ));

        //store the data in database
        $profile = Profile::find($id);

        $profile->cancelled = 1;

        $profile = new Profile;

            $profile->username = $request->username;
            $profile->description = $request->description;
            $profile->skillsoffered = $request->skillsoffered;
            $profile->location = $request->location;
            $profile->user_id= Auth::user()->id;

            $profile->save();

        //flash message

        //redirect to another page
            return redirect()->route('profile.show', ['id'=>$profile->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::find($id);

        $profile->cancelled = 1;

        $profile->save();

        return redirect()->route('home');
    }
}
