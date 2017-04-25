<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contribution;
use App\AcceptContribution;
use Illuminate\Support\Facades\Auth;

class AcceptContributionController extends Controller
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

        $acceptContribution = new AcceptContribution;
        $contribution_id = Contribution::find($request->contribution_id)->id;

        $acceptContribution->contribution_id = $contribution_id;
        $acceptContribution->user_id = Auth::user()->id;

        $acceptContribution->save();

        return redirect()->action('ContributionController@show', ['id'=>$contribution_id]);    
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
        $acceptContribution = AcceptContribution::where('user_id', Auth::user()->id)
                       ->where('inquiry_id', $id)
                       ->get();

        Log::info('Result from acceptContribution: '.$acceptContribution);

        $acceptContribution[0]->delete();

        return redirect()->action('ContributionController@show', ['id'=>$id]);
    }
}
