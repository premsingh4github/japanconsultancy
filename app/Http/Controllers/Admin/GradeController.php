<?php

namespace App\Http\Controllers\Admin;

use App\Grade;
use App\Student;
use App\StudentGrade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{
    public function index(){
        $title = 'Student Grade Management - Admin-Panel - Chubi Management System';
        $grades = Grade::orderBy('name','ASC')->get();
//        $list_students = StudentGrade::all();
        return view('Admin.Student.Grade.index',compact('title','grades'));
    }
    public function create(){
        $title = 'Student Grade Management - Admin-Panel - Chubi Management System';
        $students = Student::orderBy('class_room_batch_id','ASC')->get();
        $grades = Grade::all();
        return view('Admin.Student.Grade.create',compact('title','grades','students'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'year' => 'required',
            'student_id' => 'required',
            'grade_id' => 'required',
        ]);
        foreach (\request('student_id')as $key => $value){
            if ((StudentGrade::where('student_id',$value)->where('grade_id',$request->grade_id)->where('year',$request->year)->count())==0){
                $student_grades = StudentGrade::firstOrNew(['student_id'=>$value,'grade_id'=>$request->grade_id,'year'=>$request->year]);
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
        $grades = Grade::all();
        return view('Admin.Student.Grade.edit',compact('title','grades','students'));
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'year' => 'required',
            'grade_id' => 'required',
        ]);
        $students = StudentGrade::findOrFail($id);
        $students->year = $request->year;
        $students->grade_id = $request->grade_id;
        $students->save();
        return redirect('admin/view_grade_wise')->with('success', 'Record Updated Successfully');
    }
    public function delete($id){
        $students = StudentGrade::findOrFail($id);
        $students->delete();
        return redirect('admin/view_grade_wise')->with('success', 'Record Deleted Successfully');
    }
}
