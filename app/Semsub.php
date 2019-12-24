<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semsub extends Model
{
    protected $table = 'semester_subject';

    public function subjs()
    {
        return $this->hasMany('App\Subject', 'subject_id', 'subject_id');
    }

    public function semesters()
    {
        return $this->hasMany('App\Semester', 'semester_id', 'semester_id');
    }
}
