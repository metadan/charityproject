<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\Contribution;
use App\Inquiry;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSkillsInquiry()
    {
        //create a variable and store all the skills in the inquiry
        $skillsinquiry = Skill::where('skillsneeded', Skill::skill()->id)
                    ->get();
    }

    public function getSkillsContribution()
    {
    	//create a variable and store all the skills in the contribution
    	$skillscontribution = Skill::where('skillsoffered', Skill::skill()->id)
    					->get();
    }

    public function getAllSkills(){
    	//create a variable and store all skills
    	$skills = Skill::all();

    	return view('inquiries.create')->withSkills($skills);
    }

}
