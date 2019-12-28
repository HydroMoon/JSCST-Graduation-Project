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
use App\Degreeinfo;

class AdminController extends Controller
{
    public function getIndex()
    {
        $speciality = Speciality::all();
        $semester = Semester::all();

        return view('admin.panel')->with(['speciality' => $speciality, 'semester' => $semester]);
    }

    public function getStudentInfo()
    {
        $speciality = Speciality::all();
        $semester = Semester::all();

        return view('admin.std')->with(['speciality' => $speciality, 'semester' => $semester]);
    }

    public function getDegreeInfo(Request $request)
    {
        $degreInfoId = Degreeinfo::where([
            ['semester_id', $request->semester_id],
            ['speciality_id', $request->speciality_id],
            ['degree_year', 2019]
        ])->get();

        $tableName = 'speciality_student_' . $request->speciality_id . '_' . date('Y');

        $spec_std = DB::table($tableName)
            ->join('student', $tableName . '.university_id', '=', 'student.university_id')
            ->get();

        $semsub = Semsub::where([
            ['semester_id', $request->semester_id],
            ['speciality_id', $request->speciality_id]
        ])->get();

        $degreeInfo = DB::table('degree_' . $degreInfoId[0]->degree_id)
            ->get();

        $speciality = Speciality::find($request->speciality_id);
        return view('admin.entry')->with(['student' => $spec_std, 'subject' => $semsub, 'degInfo' => $degreeInfo, 'spec' => $speciality]);
    }

    public function getDegreeEnter($id)
    {
        $tableName = 'speciality_student_' . $id . '_' . date('Y');

        $spec_std = DB::table($tableName)
            ->join('student', $tableName . '.university_id', '=', 'student.university_id')
            ->get();

        $spec = Speciality::where('speciality_id', $id)->get()[0];
        $semsub = Semsub::where([
            ['semester_id', 1],
            ['speciality_id', $id]
            ])->get();

        $degreeinfo_id = Degreeinfo::where([
            ['semester_id', 1],
            ['speciality_id', $id]
        ])->get()[0];

        $studentDegree = null;
        if (Schema::hasTable('degree_' . $degreeinfo_id->degree_id)) {

            $studentDegree = DB::table('degree_' . $degreeinfo_id->degree_id)->get();
        }

        //dd($degreeinfo_id->degree_id);

        return view('admin.enterDeg')->with(['spec' => $spec, 'student' => $spec_std, 'semsub' => $semsub, 'stdInfo' => $degreeinfo_id->degree_id, 'stddeg' => $studentDegree]);
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

    public function getViewStudent(Request $request)
    {
        $tableName = 'speciality_student_' . $request->speciality_id . '_' . date('Y');

        $students = DB::table($tableName)
            ->join('student', $tableName . '.university_id', '=', 'student.university_id')
            ->get();

        $speciality = Speciality::find($request->university_id);

        return view('admin.viewStudent')->with(['student' => $students, 'spec_id' => $request->speciality_id, 'spec' => $speciality]);
    }

    public function storeDegreeEnter(Request $request)
    {

        $degreeinfo_id = Degreeinfo::where([
            ['semester_id', $request->sem_id],
                ['speciality_id', $request->spec_id]
        ])->get()[0];

        $tableName = 'degree_' . $degreeinfo_id->degree_id;

        $semsub = Semsub::where([
                ['semester_id', $request->sem_id],
                ['speciality_id', $request->spec_id]
            ])->get();

        if (!Schema::hasTable($tableName)) {
        //Dynamic table will be name according to degree_info table PK_ID
        //This table will be dynamically created
        //Dynamic table will be created using information derived from this table
        //Table naming schema will be degree_(degree_info_id)
        Schema::create($tableName, function (Blueprint $table) use ($semsub) {
            $table->integerIncrements('id');
            $table->bigInteger('university_id');//will be inserted according to student speciality
            //$table->integer('subject_id');//will be inserted according to the semester which the student study in
            foreach ($semsub as  $item) {
                $table->float(str_replace(' ', '', $item->subjs[0]->subject_name));
            }
            $table->float('total');
            $table->timestamps();
        });

        Schema::table($tableName, function (Blueprint $table) {
            $table->foreign('university_id')
            ->references('university_id')
            ->on('student')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
        }

        $id = DB::table($tableName)->where('university_id', $request->deg[0]['university_id'])->get();

        foreach ($request->deg as $key => $item) {

            if ($id->count() > 0) {
                DB::table($tableName)->where('university_id', $request->deg[$key]['university_id'])
                    ->update($item);
            } else {
                DB::table($tableName)
                    ->insert($item);
            }
        }

        return redirect()->route('admin');
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
                'subject_id' => $subject->id,
                'speciality_id' => $subject->speciality_id
            )
        );

        $degreeInfo = new Degreeinfo;
        $degreeInfo->semester_id = $request->semester_id;
        $degreeInfo->speciality_id = $request->speciality_id;
        $degreeInfo->degree_year = date('Y');
        $degreeInfo->save();


        $request->session()->flash('success', 'Task was successful!');

        return redirect()->route('subject');
    }

}

