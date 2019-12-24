<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subject';

    public function semsub()
    {
        return $this->belongsToMany('App\Semsub', 'subject_id', 'subject_id');
    }

    public function specs()
    {
        return $this->belongsToMany('App\Speciality', 'speciality_id', 'speciality_id');
    }
}
