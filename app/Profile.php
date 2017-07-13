<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //eloquent relationship between tables in database - join tables
    public function skill(){
    	return $this->hasOne('App\Skill', 'id', 'skills');
    }


}
