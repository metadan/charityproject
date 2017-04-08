<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquiry;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all inquiries made that are in the database in that variable
        $inquiries = Inquiry::all();

        //return a view and pass in the above variable
        return view('inquiries.index')->withInquiries($inquiries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inquiries.create');
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
                    'numberofpersonsneeded' => 'required'
                    ));

        //store in the database
            $inquiry = new Inquiry;

            $inquiry->title = $request->title;
            $inquiry->description = $request->description;
            $inquiry->date = $request->date;
            $inquiry->starttime = $request->starttime;
            $inquiry->endtime = $request->endtime;
            $inquiry->skillsneeded = $request->skillsneeded;
            $inquiry->numberofpersonsneeded = $request->numberofpersonsneeded;

            $inquiry->save();

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
        $inquiry = Inquiry::find($id);
        return view('inquiries.show')->withInquiry($inquiry);
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
