<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $table = 'speciality';


    public function subjects()
    {
        return $this->hasMany('App\Subject', 'speciality_id', 'speciality_id');
    }
}
