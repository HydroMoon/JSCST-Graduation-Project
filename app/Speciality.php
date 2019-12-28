<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $table = 'speciality';
    protected $primaryKey = 'speciality_id';


    public function subjects()
    {
        return $this->hasMany('App\Subject', 'speciality_id', 'speciality_id');
    }
}
