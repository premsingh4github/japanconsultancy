<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subject;
use App\Teacher;
use App\Country;
use App\TeacherSubject;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_teacher(Request $request){
        if ($request->isMethod('get')){
            $countries = Country::all();
            $Subjects = Subject::orderBy('name','ASC')->get();
            $TeacherData = Teacher::all();
            return view('Admin.Teacher.add_teacher',compact('TeacherData','countries','Subjects'));

        }
        if ($request->isMethod('post')){
            $this->validate($request, [
                'last_teacher_name' => 'required',
                'subject_id' => 'required',

            ]);
        }
        $teacher = new Teacher();
        $teacher->last_teacher_name = \request('last_teacher_name');
        $teacher->first_teacher_name = \request('first_teacher_name');
        $teacher->last_teacher_japanese_name = \request('last_teacher_japanese_name');
        $teacher->first_teacher_japanese_name = \request('first_teacher_japanese_name');
        $teacher->teacher_sex = \request('teacher_sex');


//        if($request->hasFile('photo')){
//            $filename = time().'.'.request()->file('photo')->getClientOriginalExtension();
//
//            $filename = md5(microtime()) . '.' . $filename;
//
//            request()->file('photo')->move('public/teacher/',$filename);
//            $teacher->photo =$filename;
//        }


        if ($teacher->save()) {
            foreach (\request('subject_id')as $key => $value){
                $teacher_subject = TeacherSubject::firstOrNew(['subject_id'=>$value,'teacher_id'=>$teacher->id]);
                $teacher_subject->save();
            }

            return redirect('admin/list_teacher')->with('success', 'Record Saved Successfully');
        }
    }


    public function list_teacher (Request $request)
    {
        if ($request->isMethod('get')){
            $TeacherData  = Teacher::all();
        }
       return view('Admin.Teacher.list_teacher',compact('TeacherData'));
    }


    public function edit_teacher($id){
        $teacher = Teacher::findOrfail($id);
        $countries = Country::all();
        $Subjects = Subject::all();
        $title = 'Edit Teacher Record | Chubi : Management System';
        return view('Admin.teacher.edit_teacher', compact( 'title','teacher','countries','Subjects'));
    }
    public function view_teacher($id){
        $country = Country::all();
        $teacher = Teacher::findOrfail($id);
        $TeacherData = Teacher::all();
        $subject=TeacherSubject::where('teacher_id',$id)->get();
        $title = 'View Teache Record | Chubi Project : Management System';
        return view('Admin.teacher.view_teacher', compact( 'title','teacher','subject','TeacherData','country'));
    }

    public function update_teacher(Request $request, $id){
        $this->validate($request, [
            'last_teacher_name' => 'required',
            'first_teacher_name' => 'required',
            'last_teacher_japanese_name' => 'required',
            'first_teacher_japanese_name' => 'required',
        ]);
        $TeacherData = Teacher::findOrFail($id);
        $TeacherData->last_teacher_name = \request('last_teacher_name');
        $TeacherData->first_teacher_name = \request('first_teacher_name');
        $TeacherData->last_teacher_japanese_name = \request('last_teacher_japanese_name');
        $TeacherData->first_teacher_japanese_name = \request('first_teacher_japanese_name');
        $TeacherData->teacher_number = \request('teacher_number');
        $TeacherData->personal_phone_number1 = \request('personal_phone_number1');
        $TeacherData->personal_phone_number2 = \request('personal_phone_number2');
        $TeacherData->personal_phone_number3 = \request('personal_phone_number3');
        $TeacherData->teacher_note = \request('teacher_note');
        $TeacherData->country_id = \request('country_id');
        $TeacherData->subject_id = \request('subject_id');
        $TeacherData->address = \request('address');
        $TeacherData->teacher_sex = \request('teacher_sex');
        $TeacherData->first_teacher_japanese_name = \request('first_teacher_japanese_name');
        $TeacherData->date_of_birth = \request('date_of_birth');
        if($request->hasFile('photo')){
            if (is_file(url('public/photo/teacher').'/'.$TeacherData->photo) && file_exists(url('public/photos/teacher').'/'.$TeacherData->photo)){
                unlink(url('public/photos/teacher').'/'.$TeacherData->photo);
            }
            $filename = time().'.'.request()->file('photo')->getClientOriginalExtension();

            $filename = md5(microtime()) . '.' . $filename;

            request()->file('photo')->move('public/photos/teacher',$filename);
            $TeacherData->photo =$filename;
        }

        $TeacherData->save();
        return redirect('admin/list_teacher')->with('success', 'Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
