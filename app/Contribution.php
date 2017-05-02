<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Contribution extends Model
{
    use Searchable;

    public function skill(){
    	return $this->hasOne('App\Skill', 'id', 'skillsoffered');
    }

    public function location(){
    	return $this->hasOne('App\Location', 'id', 'location_id');
    }
}
