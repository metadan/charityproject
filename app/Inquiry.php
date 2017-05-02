<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Inquiry extends Model
{
    use Searchable;


    //eloquent relationship between tables in database - join tables
    public function skill(){
    	return $this->hasOne('App\Skill', 'id','skillsneeded');
    }

    public function location(){
    	return $this->hasOne('App\Location', 'id','location_id');
    }
}
