<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquiry;
use App\AcceptInquiry;
use App\Contribution;
use App\AcceptContribution;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $createdinquiries = Inquiry::where('creator_id', Auth::user()->id)
                          ->count();

        $acceptedinquiries = AcceptInquiry::where('user_id', Auth::user()->id)
                            ->count();

        $createdcontributions = Contribution::where('creator_id', Auth::user()->id)
                              ->count();

        $acceptedcontributions = AcceptContribution::where('user_id', Auth::user()->id)
                               ->count();

        return view('home')->with('createdinquiries', $createdinquiries)->with('acceptedinquiries', $acceptedinquiries)->with('createdcontributions', $createdcontributions)->with('acceptedcontributions', $acceptedcontributions);
    }

    public function getInquiries(){

        //create a variable and store all inquiries that are not cancelled made by a user
        $inquiries = Inquiry::with('skill', 'location')
                    ->where('creator_id', Auth::user()->id)
                    ->where('cancelled', 0)
                    ->get();

        //create a variable that finds the inquiry_id the user has accepted to - array of object [{'id':2}}
        $inquiry_ids = AcceptInquiry::select('inquiry_id AS id')->where('user_id', Auth::user()->id)
                       ->get();

        //new variable - array of id [2]
        $inquiry_ids_new = array();

        foreach ($inquiry_ids as $id) {
            array_push($inquiry_ids_new, $id -> id);
        }

        Log::info('Result from $inquiry_ids_cleaned: '.implode(' ', $inquiry_ids_new));
   
        //store all accepted inquiries for a user
        $acceptedInquiries = Inquiry::findMany($inquiry_ids_new)
                            ->where('cancelled', 0);

        Log::info('Result from acceptedInquiries: '.$acceptedInquiries);

        //return a view            
        return view('home.inquiries')->with('inquiries', $inquiries)->with('acceptedInquiries', $acceptedInquiries);
    }

    public function getContributions(){

        //create a variable and store all the contributions that are not cancelled made by a user
        $contributions = Contribution::with('skill', 'location')
                        ->where('creator_id', Auth::user()->id)
                        ->where('cancelled', 0)
                        ->get();

        //create a variable that finds the contribution_id the user has accepted to - array of object [{'id':2}]
        $contribution_ids = AcceptContribution::select('contribution_id AS id')->where('user_id', Auth::user()->id)
                            ->get();

        //new variable - array of id [2]
        $contribution_ids_new = array();

        foreach($contribution_ids as $id){
            array_push($contribution_ids_new, $id -> id);
        }
   
        //store all contributions the user has accepted
        $acceptedContributions = Contribution::findMany($contribution_ids_new)
                                ->where('cancelled', 0);

        Log::info('Result from acceptedContributions: '.$acceptedContributions);

        //return a view
        return view('home.contributions')->with('contributions', $contributions)->with('acceptedContributions', $acceptedContributions);
    }

    public function getAccount()
    {
        return view('home.account');
    }

    public function getSettings()
    {
        return view('home.settings');
    }

    public function getProfile()
    {
        $profile = Profile::where('user_id', Auth::user()->id)
                   ->get();

        Log::info('Result from profile: '.$profile);
        if(count($profile)>0){
            return redirect()->action('ProfileController@show', ['id'=>$profile[0]->id]);
        }else{
            return redirect()->action('ProfileController@create');
        }
    }

}
