<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Inquiry extends Model
{
    use Searchable;

    public function skill(){
    	return $this->hasOne('App\Skill', 'id');
    }
}
