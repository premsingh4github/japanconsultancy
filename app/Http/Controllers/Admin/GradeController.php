<?php

namespace App\Http\Controllers\Admin;

use App\Grade;
use App\GradeDuration;
use App\Student;
use App\StudentGrade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{
    public function index(){
        $title = 'Student Grade Management - Admin-Panel - Chubi Management System';
        $grades = GradeDuration::orderBy('year','DESC')->get();
//        $list_students = StudentGrade::all();
        return view('Admin.Student.Grade.index',compact('title','grades'));
    }
    public function create(){
        $title = 'Student Grade Management - Admin-Panel - Chubi Management System';
        $students = Student::orderBy('class_room_batch_id','ASC')->get();
        $grades = GradeDuration::all();
        return view('Admin.Student.Grade.create',compact('title','grades','students'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'student_id' => 'required',
            'grade_id' => 'required',
        ]);
        foreach (\request('student_id')as $key => $value){
            if ((StudentGrade::where('student_id',$value)->where('grade_id',$request->grade_id)->count())==0){
                $student_grades = StudentGrade::firstOrNew(['student_id'=>$value,'grade_id'=>$request->grade_id]);
                $student_grades->save();
            }else{
                return redirect()->back()->with('error', 'This student already transfered in choosen garde and year');
            }
        }
        return redirect()->back()->with('success', 'Record Saved Successfully');
    }
    public function edit($id){
        $title = 'Student Grade Management - Admin-Panel - Chubi Management System';
        $students = StudentGrade::findOrFail($id);
        $grades = GradeDuration::all();
        return view('Admin.Student.Grade.edit',compact('title','grades','students'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'grade_id' => 'required',
        ]);
        $students = StudentGrade::findOrFail($id);
        $students->grade_id = $request->grade_id;
        $students->save();
        return redirect('admin/view_grade_wise')->with('success', 'Record Updated Successfully');
    }
    public function delete($id){
        $students = StudentGrade::findOrFail($id);
        $students->delete();
        return redirect('admin/view_grade_wise')->with('success', 'Record Deleted Successfully');
    }
    public function create_grade_duration(){
        $title = 'Student Grade Duration Manage - Admin-Panel - Chubi Management System';
        $grades = Grade::all();
        $grade_durations = GradeDuration::all();
        return view('Admin.Student.Grade.add_grade_duration',compact('title','grades','grade_durations'));
    }
    public function store_grade_duration(Request $request){
        $this->validate($request,[
            'year' => 'required',
            'grade_id' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
        ]);
        $check = GradeDuration::where('year',$request->year)->where('grade_id',$request->grade_id)->count();
        if ($check>0){
            return redirect('admin/add_grade_duration')->with('error','Already Submited!!');
        }else{
            $grade_duration = new GradeDuration();
            $grade_duration->year = $request->year;
            $grade_duration->grade_id = $request->grade_id;
            $grade_duration->start_at = $request->start_at;
            $grade_duration->end_at = $request->end_at;
            $grade_duration->save();
            return redirect('admin/add_grade_duration')->with('success','Record Saved Successfully !');
        }
    }
    public function edit_grade_duration($id){
        $title = 'Edit Grade Duration - Admin-Panel - Chubi Management System';
        $grades = Grade::all();
        $grade_duration = GradeDuration::findOrFail($id);
        return view('Admin.Student.Grade.edit_grade_duration',compact('title','grades','grade_duration'));
    }
    public function update_grade_duration(Request $request, $id){
        $this->validate($request,[
            'year' => 'required',
            'grade_id' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
        ]);
        $check = GradeDuration::where('year',$request->year)->where('grade_id',$request->grade_id)->count();
        if ($check>0){
            return redirect()->back()->with('error','Already Submited!!');
        }else{
            $grade_duration = GradeDuration::findOrFail($id);
            $grade_duration->year = $request->year;
            $grade_duration->grade_id = $request->grade_id;
            $grade_duration->start_at = $request->start_at;
            $grade_duration->end_at = $request->end_at;
            $grade_duration->save();
            return redirect('admin/add_grade_duration')->with('success','Record Updated Successfully !');
        }

    }

}
