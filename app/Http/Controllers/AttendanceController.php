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
        $student = Student::where('unique_id',$code)->first();
        $attendance = new Attendance;
        $attendance->student_id = $student->id;
        $attendance->save();
        return response()->json(['user'=>$student,'status'=>"Accepted"],200);
    }
}
