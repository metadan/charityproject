<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquiry;
use App\Contribution;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    public function search(Request $req){

    	//type and search
    	$type = $req->type;

    	if($type === "inquiries"){

    		//search inquiries
    		$searchinquiries = Inquiry::search($req->search)->get();
            
    		Log::info('Result from searchinquiries: '.$searchinquiries);

    		//return view with data

    		return view('search')->with('data', $searchinquiries)->with('type', $type);
    		
    	}elseif ($type === "contributions") {

    		//search contributions
    		$searchcontributions = Contribution::search($req->search)->get();
            
    		Log::info('Result from searchcontributions: '.$searchcontributions);

    		//return view with data
    		return view('search')->with('data', $searchcontributions)->with('type', $type);
    	}
    }
}
