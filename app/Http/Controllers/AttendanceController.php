<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\ClassBatchSection;
use App\ClassBatchSectionPeriod;
use App\ClassSectionStudent;
use App\Event;
use App\Exports\ClassBatchSectionExport;
use App\Period;
use App\Student;
use App\StudentStatus;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Nexmo\Numbers\Number;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('attendance');
    }

    public function store($code)
    {
        $holidays = \App\Event::where('start_date',date('Y-m-d'))->count();
        if (date('D')=='Sat' || date('D')=='Sun' || $holidays>0){
            return redirect()->back()->withErrors(['Something went wrong!.Please Try Again | Today it may be a holiday.']);
        }else{
            if($student = Student::where('unique_id',$code)->first()){
                $attendance = new Attendance;
                $attendance->student_id = $student->id;
                $attendance->attendance_for = date('Y-m-d');
                $attendance->save();
                Session::flash('student_id',$student->id);
                return redirect()->back()->with('success','Attendance Successfully !!! ' .$student->first_student_name .' '.$student->last_student_name .' is Present !');
            }else{
                return redirect()->back()->withErrors(['Something went wrong!.Please Try Again']);
            }
        }
    }

    public function show()
    {
        ini_set('max_execution_time',1200);
        $sections = ClassBatchSection::all();

        if(\request('section')){
            $class_section_student = ClassBatchSection::with('class_batch_section_periods')->with('class_section_students.student')->find(\request('section'));

            $students = $class_section_student->class_section_students()->paginate(15);
            return view('attendance.show_batch',compact('class_section_student','sections','students'));
        }else{
            $class_section_student = $sections[0];
            $attendances = Attendance::select(DB::raw('MAX(attendances.id) as my_id, attendances.student_id ,MAX(attendances.created_at) as time'))->with('student')->groupBy('attendances.student_id')->orderBy('my_id','DESC')->get();
            return view('attendance.show_today',compact('attendances','sections','class_section_student'));
        }
    }

    public function getattendacelist($section,$id)
    {
        $class_section_student = ClassBatchSection::with('class_batch_section_periods')->with('class_section_students.student')->find($section);




//        $view = view('attendance.show_list',compact('class_section_student'));
//        $view = View::make('attendance.show_list', $data);  //View::make('attendance.show_list', $data);


//        return $view;
        return \response()->view('attendance.show_list',compact('class_section_student','id'))->header('id',$id);
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
        $holidays = \App\Event::where('start_date',date('Y-m-d'))->count();
        $this->validate(request(),[
            'date' => 'required',
            'student_id' => 'required',
        ]);
        if (date('D')=='Sat' || date('D')=='Sun' || $holidays>0){
            return redirect()->back()->withErrors(['Something went wrong!.Please Try Again | Today it may be a holiday.']);
        }else {
            $attendance = new Attendance();
            $attendance->student_id = \request('student_id');
            $attendance->created_at = date('Y-m-d h:i:s', strtotime(\request('date')));
            $attendance->updated_at = date('Y-m-d h:i:s', strtotime(\request('date')));
            $attendance->attendance_for = date('Y-m-d', strtotime(\request('date')));
            $attendance->save();
            Session::flash('success', 'Attendance created!');
            return redirect('admin/manage_attendance');
        }
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

    public function getattendace($code)
    {
        $data = explode('_',$code);
        $period = $data[0];
        if(($attendences = Attendance::where('student_id',$data[3])->whereBetween('updated_at', array($data[2].' 00:00:00',$data[2].' 23:59:59'))->orderBy('id','ASC')->get()) && ($attendences->count() > 0) ){
            $class_section_student_id = $data[1];
            $class_section_student = ClassSectionStudent::select(DB::raw('class_section_students.student_id, class_batch_sections.id as cbs_id, class_batch_section_periods.*'))->join('class_batch_sections','class_batch_sections.id','=','class_section_students.class_section_id')->join('class_batch_section_periods','class_batch_section_periods.c_b_s_id','=','class_batch_sections.id')->whereHas('class_section',function ($class_section) use ($period) {
                $class_section->whereHas('class_batch_section_periods',function ($section_periods) use ($period) {
                    $section_periods->where('period_id',$period);
                });
            })->find($class_section_student_id);
            $dif = (strtotime(date('H:i',strtotime($attendences[0]->created_at))) - strtotime($class_section_student->start_at))/(60);
            if($dif < 10){
                return response()->json(['id'=>$code,'status'=>"P"]);
            }elseif (($dif >= 10 ) && (strtotime(date('H:i',strtotime($attendences[0]->created_at))) < strtotime($class_section_student->end_at)) ) {
                return response()->json(['id'=>$code,'status'=>"L"]);
            }
            return response()->json(['id'=>$code,'status'=>"A"]);
        }else{
            return response()->json(['id'=>$code,'status'=>"A"]);
        }


    }

    public function make_absent($id){
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        return redirect()->back()->with('success','Student Absent Successfully!');
    }
    public function new_attend_entry(Request $request, $attend, $period){
        $attends = Attendance::findOrFail($attend);
        $attend_sts = new StudentStatus();
        $attend_sts->attendance_id = $attends->id;
        $attend_sts->student_id = $attends->student_id;
        $attend_sts->status = $request->status;
        $attend_sts->created_at = $attends->created_at;
        $attend_sts->period_id = $period;
        $attend_sts->save();

        return \response()->view('attendance.new_attend_entry',compact('attend_sts'))->header('id',"attendance_".$attend."_".$period);
    }
    public function exist_attend_update(Request $request, $id){
        $attend_sts = StudentStatus::findOrFail($id);
        $attend_sts->status = $request->status;
        $attend_sts->save();

        return \response()->view('attendance.ajax.exist_attend_update',compact('attend_sts'))->header('old_status',"old_status_".$id);
    }
    public function get_new_attend(Request $request,$section_period,$period_time,$period,$student){
        $start_at = date('Y-m-d H:i:s',strtotime($period_time));
        $attends = new Attendance();
        $attends->student_id = $student;
        $attends->created_at = $start_at;
        $attends->attendance_for = date('Y-m-d',strtotime($start_at));
        $attends->type = '1';
        $attends->save();

        $periods = Period::all();
        foreach ($periods as $period_exist){
            $attend_sts = new StudentStatus();
            $attend_sts->attendance_id = $attends->id;
            $attend_sts->student_id = $student;
            $attend_sts->created_at = $attends->created_at;
            if ($period_exist->id == $period && $request->status=='present'){
                $attend_sts->period_id = $period;
                $attend_sts->status = 'present';
            }elseif($period_exist->id == $period && $request->status=='late'){
                $attend_sts->period_id = $period;
                $attend_sts->status = 'late';
            }else{
                $attend_sts->period_id = $period_exist->id;
                $attend_sts->status = 'absent';
            }
            $attend_sts->save();

        }
        return \response()->view('attendance.ajax.get_new_attend_entry',compact('attends'))->header('new_attendance',"xyz_attendance_".$section_period."_".$student);
    }
}
