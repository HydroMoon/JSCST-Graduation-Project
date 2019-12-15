<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Speciality;

class ResultEnquiryController extends Controller
{
    public function getIndex()
    {
        $speciality = Speciality::all('speciality_id', 'speciality_name');

        return view('main.result')->withSpeciality($speciality);
    }
}
