<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\ClassBatchSection;
use App\ClassSectionStudent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(){
        $title = "Attendance Report - Chubi Management System";
        $sections = ClassBatchSection::all();
        return view('Admin.Report.attendance.index',compact('title','sections'));
    }
    public function view(Request $request){
        $title = "Attendance Report - Chubi Management System";
        $sections = ClassBatchSection::all();
        if (\request('c_b_s_id')){
            $class_section_student = ClassBatchSection::with('class_batch_section_periods')->with('class_section_students.student')->find(\request('c_b_s_id'));
        }else{
            $class_section_student = $sections[0];
            $attendances = Attendance::select(DB::raw('MAX(attendances.id) as my_id, attendances.student_id ,MAX(attendances.created_at) as time'))->with('student')->groupBy('attendances.student_id')->orderBy('my_id','DESC')->get();
        }
        return view('Admin.Report.attendance.view',compact('title','sections','class_section_student','attendances'));
    }
    public function getattendacelist($section,$id,$from_date,$to_date)
    {
        $class_section_student = ClassBatchSection::with('class_batch_section_periods')->with('class_section_students.student')->find($section);

        if (isset($from_date) && isset($to_date)){
            $start_date = $from_date;
            $end_date = $to_date;
            return \response()->view('Admin.Report.attendance.show_list',compact('class_section_student','id','start_date','end_date'))->header('id',$id);
        }
        elseif(isset($from_date)){
            $start_date = $from_date;
            $end_date = $from_date;
            return \response()->view('Admin.Report.attendance.show_list',compact('class_section_student','id','start_date','end_date'))->header('id',$id);
        }
        elseif(isset($to_date)){
            $start_date = $class_section_student->start_date;
            $end_date = $to_date;
            return \response()->view('Admin.Report.attendance.show_list',compact('class_section_student','id','start_date','end_date'))->header('id',$id);
        }
        else{
            $start_date = $class_section_student->start_date;
            $end_date = $class_section_student->end_date;
            return \response()->view('Admin.Report.attendance.show_list',compact('class_section_student','id','start_date','end_date'))->header('id',$id);
        }
//        $view = view('attendance.show_list',compact('class_section_student'));
//        $view = View::make('attendance.show_list', $data);  //View::make('attendance.show_list', $data);
//        return \response()->view('Admin.Report.attendance.show_list',compact('class_section_student','id'))->header('id',$id);

//        return $view;
    }


}
