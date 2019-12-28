<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Speciality;
use App\Semester;
use App\Degreeinfo;
use App\Student;
use App\Semsub;

class ResultEnquiryController extends Controller
{
    public function getIndex()
    {
        $speciality = Speciality::all('speciality_id', 'speciality_name');
        $semester = Semester::all();


        return view('main.result')->with(['speciality' => $speciality, 'semester' => $semester]);
    }

    public function getDegreeResult(Request $request)
    {
        $degreInfoId = Degreeinfo::where([
            ['semester_id', $request->semester_id],
            ['speciality_id', $request->speciality_id],
            ['degree_year', 2019]
        ])->get();

        $student = Student::where('university_id', $request->university_id)->get();

        $semsub = Semsub::where([
            ['semester_id', $request->semester_id],
            ['speciality_id', $request->speciality_id]
        ])->get();

        $degreeInfo = DB::table('degree_' . $degreInfoId[0]->degree_id)
            ->where('university_id', $request->university_id)
            ->get();

        $speciality = Speciality::find($request->speciality_id);



        return view('main.final')->with(['student' => $student[0], 'degInfo' => $degreeInfo[0], 'subject' => $semsub, 'spec' => $speciality]);
    }
}
