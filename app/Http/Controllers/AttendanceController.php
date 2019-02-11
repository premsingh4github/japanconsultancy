<?php

namespace App\Http\Controllers;

use App\Attendance;
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
        $attendaces = Attendance::select('student_id')->with('student')->distinct('student_id')->get();
        return view('attendance.show',compact('attendaces'));
    }
}
