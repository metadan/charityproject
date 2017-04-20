<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contribution;
use Illuminate\Support\Facades\Auth;

class ContributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all the contributions in it from the database
        $contributions = Contribution::all();

        //return a view and pass in the above variable
        return view('contributions.index')->withContributions($contributions);
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

        return view('contributions.create'); 
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
                'numberofpersonsoffered' => 'required'
                ));

        //store the data in database
        $contribution = new Contribution;

            $contribution->title = $request->title;
            $contribution->description = $request->description;
            $contribution->date = $request->date;
            $contribution->starttime = $request->starttime;
            $contribution->endtime = $request->endtime;
            $contribution->skillsoffered = $request->skillsoffered;
            $contribution->numberofpersonsoffered = $request->numberofpersonsoffered;
            $contribution->creator_id = Auth::user()->id;

            $contribution->save();

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
        $contribution = Contribution::find($id);
        return view('contributions.show')->withContribution($contribution);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
