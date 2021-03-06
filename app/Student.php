<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';

    public function speciality()
    {
        return $this->hasOne('App\Speciality', 'speciality_id', 'speciality_id');
    }

}
