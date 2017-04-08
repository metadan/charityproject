<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{

	public function getIndex(){
		#process data and params
		#talk to the model - the model can update the database
		#receive data back from model
		#compile data or process data from the model if needed
		#pass that data to correct view
		return view('pages/welcome');
	}

	public function getAbout(){
		return view('pages/about');
	}

	public function getTerms(){
		return view('pages/terms');
	}

	public function getPrivacy(){
		return view('pages/privacy');
	}

	//public function getLogin(){
		//return view('pages/login');
	//}

	//public function getSignup(){
		//return view('pages/signup');
	//}

	//public function getLoginsignup(){
		//return view('pages/loginsignup');
	//}
}