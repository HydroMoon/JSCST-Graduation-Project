<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

use App\Student;
use App\Speciality;
use App\Subject;
use App\Semester;
use App\Semsub;
use App\Dynamicspec;

class AdminController extends Controller
{
    public function getIndex()
    {
        return view('admin.panel');
    }

    public function getStudent()
    {
        $speciality = Speciality::all('speciality_id', 'speciality_name');

        return view('admin.addStudent')->withSpeciality($speciality);
    }

    public function getSubject()
    {
        $speciality = Speciality::all();
        $semester = Semester::all();

        return view('admin.subject')->with(['speciality' => $speciality, 'semester' => $semester]);
    }

    public function getStudentFee($id, $uni_id)
    {
        $tableName = 'speciality_student_' . $id . '_' . date('Y');

        $students = DB::table($tableName)
            ->where($tableName . '.university_id', $uni_id)
            ->join('student', $tableName . '.university_id', '=', 'student.university_id')
            ->get();
        $std = $students[0];

        $semester = Semester::all();

        return view('admin.studentFee')->with(['students' => $std, 'semester' => $semester, 'speciality_id' => $id]);
    }

    public function storeStudentFee(Request $request)
    {

        $speciality_id = $request->speciality_id;

        if (!Schema::hasTable('student_registeration_' . $speciality_id . '_' . date('Y'))) {

        //This table will be created dynamically
        //Naming schema will be student_registeration_(Speciality_id)_(year))
        Schema::create('student_registeration_' . $speciality_id . '_' . date('Y'), function (Blueprint $table) {
            $table->bigInteger('university_id');
            $table->tinyInteger('semester_id')->unsigned();
            $table->primary(['university_id', 'semester_id']);
            $table->float('fee')->default(0.00);
            $table->timestamps();
        });

        //FK
        Schema::table('student_registeration_' . $speciality_id . '_' . date('Y'), function (Blueprint $table) {
            $table->foreign('university_id')
            ->references('university_id')
            ->on('student')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('semester_id')
            ->references('semester_id')
            ->on('semester')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
        }

        DB::table('student_registeration_' . $speciality_id . '_' . date('Y'))->insert(
            array(
                'university_id' => $request->university_id,
                'semester_id' => $request->semester_id,
                'fee' => $request->fee
            )
        );

        $request->session()->flash('success', 'Task was successful!');

        return redirect()->route('subject');
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

        $speciality_id = $request->speciality_id;

        if (!Schema::hasTable('speciality_student_' . $speciality_id . '_' . date('Y'))) {
            //Speciality name will be for every year
        //Also will be created according to batch year
        //This table will be dynamically created at some point
        //mohand (table name  will speciality_student_(Speciality_id)_(year))
        Schema::create('speciality_student_' . $speciality_id . '_' . date('Y'), function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->bigInteger('university_id');
            $table->string('semster_name', 20)->nullable();
            $table->boolean('transfer_active')->default(0);//According to this colmun we transfer the student to degree table
            $table->timestamps();
        });

        //FK
        Schema::table('speciality_student_' . $speciality_id . '_' . date('Y'), function (Blueprint $table) {
            $table->foreign('university_id')
            ->references('university_id')
            ->on('student')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        }

        DB::table('speciality_student_' . $speciality_id . '_' . date('Y'))->insert(
            array(
                'university_id' => $request->university_id
            )
        );



        $request->session()->flash('success', 'Task was successful!');

        return redirect()->route('addSt');
    }

    public function storeSubject(Request $request)
    {
        $subject = new Subject;

        $subject->subject_name = $request->subject_name;
        $subject->subject_hours = $request->subject_hours;
        $subject->speciality_id = $request->speciality_id;

        $subject->save();

        DB::table('semester_subject')->insert(
            array(
                'semester_id' => $request->semester_id,
                'subject_id' => $subject->id
            )
        );

        $request->session()->flash('success', 'Task was successful!');

        return redirect()->route('subject');
    }

}

