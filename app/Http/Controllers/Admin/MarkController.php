<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\Markrank;
use App\Marksheet;
use App\Student;
use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MarkController extends Controller
{
    public function index(){
        $title = 'Student Mark Obtained - Admin Panel - Chubi Management System';
        $students = Student::withCount('marks')->orderBy('marks_count','DESC')->get();
        $subjects = Subject::all();
        $marks = Markrank::all();
        $exams = Exam::all();
        return view('Admin.Student.marks.index',compact('title','students','subjects','exams','marks'));
    }
    public function store(Request $request){
        $subjects = Subject::all();
        $this->validate($request,[
            'student_id' => 'required',
            'exam_id' => 'required',
        ]);
        foreach ($subjects as $subject){
            $this->validate($request,[
                'class_id'.$subject->id => 'required',
                'marks_id'.$subject->id => 'required',
            ]);
        }
        foreach ($subjects as $subject_new){
            $class_id = \request('class_id'.$subject_new->id);
            $marks = \request('marks_id'.$subject_new->id);
            $check = Marksheet::where('student_id',$request->student_id)->where('exam_id',$request->exam_id)->where('class_id',$class_id)->count();
            if ($check>0){
                return redirect('admin/mark_obtained')->with('error','Already Submitted !!');
            }else{
                $marksheet = new Marksheet();
                $marksheet->user_id = Auth::user()->id;
                $marksheet->student_id = $request->student_id;
                $marksheet->exam_id = $request->exam_id;
                $marksheet->class_id = $class_id;
                $marksheet->marks_id = $marks;
                $marksheet->save();
            }
        }
        return redirect('admin/mark_obtained')->with('success','Marks Obtained Successfully !!');
    }
    public function edit($student,$exam){
        $title = 'Student Mark Obtained Edit - Admin Panel - Chubi Management System';
        $students = Student::findOrFail($student);
        $exams = Exam::findOrFail($exam);
        $marksheets = Marksheet::where('student_id',$student)->where('exam_id',$exam)->get();
        $marks = Markrank::all();
        $subjects = Subject::all();
        return view('Admin.Student.marks.edit',compact('title','marksheets','students','exams','marks','subjects'));
    }
}
