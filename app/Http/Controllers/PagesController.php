<?php

namespace App\Http\Controllers;
use App\Contribution;
use App\Inquiry;

class PagesController extends Controller
{

	public function getIndex(){
	
		//create a variable that collects all active contributions/inquiries
		$contributions = Contribution::with('skill', 'location')
						->where('cancelled', 0)
                        ->get();

        $inquiries = Inquiry::with('skill', 'location')
        			->where('cancelled', 0)
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