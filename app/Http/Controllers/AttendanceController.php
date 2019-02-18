<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\ClassBatchSection;
use App\ClassSectionStudent;
use App\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('attendance');
    }

    public function store($code)
    {
        if($student = Student::where('unique_id',$code)->first()){
            $attendance = new Attendance;
            $attendance->student_id = $student->id;
            $attendance->save();
            return response()->json(['user'=>$student,'status'=>"Accepted"],200);
        }else{
            return response()->json(['message'=>"Invalide Card",'code'=>$code],422);
        }

    }

    public function show()
    {
        $sections = ClassBatchSection::all();
        $class_section_student = $sections[0];
        if(\request('section')){
            $class_section_student = ClassBatchSection::find(\request('section'));
        }

        return view('attendance.show',compact('sections','class_section_student'));
    }
}
