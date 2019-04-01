<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\ClassBatchSection;
use App\ClassBatchSectionPeriod;
use App\ClassSectionStudent;
use App\Exports\ClassBatchSectionExport;
use App\Period;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

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
            Session::flash('student_id',$student->id);
            return redirect('attendance_form')->with('success','Attendance Successfully !!! ' .$student->first_student_name .' '.$student->last_student_name .' is Present !');
        }else{
			return redirect('attendance_form')->withErrors(['Something went wrong!.Please Try Again']);
        }
    }

    public function show()
    {
        ini_set('max_execution_time',1200);
        $sections = ClassBatchSection::all();
        $class_section_student = $sections[0];
        if(\request('section')){
            $class_section_student = ClassBatchSection::find(\request('section'));
        }
        return view('attendance.show_new',compact('sections','class_section_student'));
    }
    public function attendance_form()
    {
        $title='Attendance Form - Chubi Management System';
        return view('attendance.exit',compact('sections','title'));
    }

    public function getAttendance()
    {
        $sections = ClassBatchSection::all();
        return view('attendance.create',compact('sections'));
    }

    public function getStudents($class_batch_section_id)
    {
        $students = ClassSectionStudent::where('class_section_id',$class_batch_section_id)->with('student')->get();
        return response()->json(['students'=>$students],200);
    }

    public function postAttendance()
    {
        $this->validate(request(),[
            'date' => 'required',
            'student_id' => 'required',
        ]);
        $attendance = new Attendance();
        $attendance->student_id = \request('student_id');
        $attendance->created_at = date('Y-m-d h:i:s', strtotime(\request('date')));
        $attendance->save();
        Session::flash('success','Attendance created!');
        return redirect('admin/manage_attendance');
    }

    public function getAttendanceExcel()
    {
        //dd(98);
        //ini_set('max_execution_time',1200);
        $sections = ClassBatchSection::all();
        $class_section_student = $sections[0];
        if(\request('section_attendance_excel')){
            $class_section_student = ClassBatchSection::find(request('section_attendance_excel'));
        }
        $class_section_name = $class_section_student->class_room_batch->class_room->name.'-'.$class_section_student->class_room_batch->batch->name.')'. $class_section_student->class_section->name.'-'.$class_section_student->shift;

        return Excel::download(new ClassBatchSectionExport(),$class_section_name.'.xlsx');
    }

}
