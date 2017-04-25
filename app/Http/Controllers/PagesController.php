<?php

namespace App\Http\Controllers;
use App\Contribution;
use App\Inquiry;

class PagesController extends Controller
{

	public function getIndex(){
		#process data and params
		#talk to the model - the model can update the database
		#receive data back from model
		#compile data or process data from the model if needed
		#pass that data to correct view

		$contributions = Contribution::where('cancelled', 0)
                        ->get();

        $inquiries = Inquiry::where('cancelled', 0)
        			->get();

		return view('pages.welcome')->with('contributions', $contributions)->with('inquiries', $inquiries);
	}

	public function getAbout(){
		return view('pages.about');
	}

	public function getTerms(){
		return view('pages.terms');
	}

	public function getPrivacy(){
		return view('pages.privacy');
	}

}