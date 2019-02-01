<?php

namespace App\Http\Controllers\Admin;

use App\Batch;
use App\ClassBatchSubject;
use App\ClassRoom;
use App\ClassRoomBatch;
use App\Country;
use App\Section;
use App\Student;
use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    public function add_subject(Request $request){
        if ($request->isMethod('get')){
            $title = 'Add Subject Record | Chubi Project : Management System';
            return view('Admin.Subject.add_subject',compact('','title'));

        }
        if ($request->isMethod('post')){
            $this->validate($request, [
                'name' => 'required|unique:subjects,name',
                'subject_type' => 'required',
            ]);

        }

        $data['name']=$request->name;
        $data['subject_type']=$request->subject_type;
        if (Subject::create($data)) {
            return redirect()->back()->with('success', 'Record Saved Successfully');
        }
    }
    public function list_subject(Request $request){
        if ($request->isMethod('get')) {
            $list_subject= Subject::all();
            $title = 'Subject Record | Chubi Project : Management System';
            return view('Admin.Subject.list_subject', compact('', 'title','list_subject'));
        }
        if ($request->isMethod('post')){

        }


        }
    public function edit_subject($id){
            $subject = Subject::findOrfail($id);
            $title = 'Edit Subject Record | Chubi Project : Management System';
            return view('Admin.Subject.edit_subject', compact('', 'title','subject'));
        }
    public function update_subject(Request $request, $id){
            $list_subject = Subject::findOrFail($id);
            $requestData = \request()->all();
            $list_subject->update($requestData);
            return redirect()->back()->with('success', 'Recored Updated');
        }

    public function add_section(Request $request){
        if ($request->isMethod('get')){
            $title = 'Add Section Record | Chubi Project : Management System';
            return view('Admin.Section.add_section',compact('','title'));

        }
        if ($request->isMethod('post')){
            $this->validate($request, [
                'name' => 'required|unique:subjects,name',
            ]);

        }

        $data['name']=$request->name;
        if (Section::create($data)) {
            return redirect()->back()->with('success', 'Record Saved Successfully');
        }
    }
    public function list_section(Request $request){
        if ($request->isMethod('get')) {
            $list_subject= Section::all();
            $title = 'Section Record | Chubi Project : Management System';
            return view('Admin.Section.list_section', compact('', 'title','list_subject'));
        }
        if ($request->isMethod('post')){

        }


        }
    public function edit_section($id){
            $subject = Section::findOrfail($id);
            $title = 'Edit Section Record | Chubi Project : Management System';
            return view('Admin.Section.edit_section', compact('', 'title','subject'));
        }
    public function update_section(Request $request, $id){
            $list_subject = Section::findOrFail($id);
            $requestData = \request()->all();
            $list_subject->update($requestData);
            return redirect()->back()->with('success', 'Recored Updated');
        }

    public function batch_wise_subject(Request $request){
        if ($request->isMethod('get')){
            $class_batch = ClassRoomBatch::all();
            $subjects = Subject::all();
            $title = 'Batch Wise Subject | Chubi Project : Management System';
            return view('Admin.Subject.batch_wise_subject',compact('','subjects','title','class_batch'));

        }
        if ($request->isMethod('post')){
            $this->validate($request, [
                'class_batch_id' => 'required',
                'subject_id' => 'required',
            ]);

        }

        $data['class_batch_id']=$request->class_batch_id;
        $data['subject_id']=$request->subject_id;

        if (ClassBatchSubject::create($data)) {
            return redirect()->back()->with('success', 'Record Saved Successfully');
        }
    }

}
