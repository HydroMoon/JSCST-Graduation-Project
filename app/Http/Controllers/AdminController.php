<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Student;
use App\Speciality;
use App\Subject;

class AdminController extends Controller
{
    public function getIndex()
    {
        return view('admin.panel');
    }

    public function getStudent()
    {
        return view('admin.addStudent');
    }

    public function getSubject()
    {
        $speciality = Speciality::all();

        return view('admin.subject')->withSpeciality($speciality);
    }

    public function getViewStudent()
    {
        $student = Student::all();

        return view('admin.viewStudent')->withStudent($student);
    }

    public function storeStudentInfo(Request $request)
    {
        $this->validate($request, array(
            'university_id' => 'required|max:20',
            'student_name' => 'required|string|max:150',
            'phone_num' => 'required|string|max:15',
            'gender' => 'required|string|max:10',
            'nationality' => 'required|string|max:50',
            'certificate_type' => 'required|string|max:50',
            'certificate_source' => 'required|string|max:50'
        ));

        $studentInfo = new Student;

        $studentInfo->university_id = $request->university_id;
        $studentInfo->student_name = $request->student_name;
        $studentInfo->phone_num = $request->phone_num;
        $studentInfo->gender = $request->gender;
        $studentInfo->nationality = $request->nationality;
        $studentInfo->certificate_type = $request->certificate_type;
        $studentInfo->certificate_source = $request->certificate_source;

        $studentInfo->save();

        $request->session()->flash('success', 'Task was successful!');

        return redirect()->route('addSt');
    }

    public function storeSubject(Request $request)
    {
        $subject = new Subject;

        $subject->subject_id = $request->subject_id;
        $subject->subject_name = $request->subject_name;
        $subject->subject_hours = $request->subject_hours;
        $subject->speciality_id = $request->speciality_id;

        $subject->save();

        $request->session()->flash('success', 'Task was successful!');

        return redirect()->route('subject');
    }

}

