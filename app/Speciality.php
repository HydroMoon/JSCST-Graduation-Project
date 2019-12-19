<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $table = 'speciality';


    public function semesters()
    {
        return $this->hasMany('App\Semester', 'semester_id', 'semester_id');
    }
}
