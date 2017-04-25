<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquiry;
use App\AcceptInquiry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AcceptInquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::guest())
        {
            return redirect()->guest('register');
        }

        $acceptInquiry = new AcceptInquiry;
        $inquiry_id = Inquiry::find($request->inquiry_id)->id;

        $acceptInquiry->inquiry_id = $inquiry_id;
        $acceptInquiry->user_id = Auth::user()->id;

        $acceptInquiry->save();

        return redirect()->action('InquiryController@show', ['id'=>$inquiry_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $acceptInquiry = AcceptInquiry::where('user_id', Auth::user()->id)
                       ->where('inquiry_id', $id)
                       ->get();

        Log::info('Result from acceptInquiry: '.$acceptInquiry);

        $acceptInquiry[0]->delete();

        return redirect()->action('InquiryController@show', ['id'=>$id]);
    }
}
