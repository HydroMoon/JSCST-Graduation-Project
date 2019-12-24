<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Speciality;
use App\Semester;

class ResultEnquiryController extends Controller
{
    public function getIndex()
    {
        $speciality = Speciality::all('speciality_id', 'speciality_name');
        $semester = Semester::all();

        return view('main.result')->with(['speciality' => $speciality, 'semester' => $semester]);
    }
}
