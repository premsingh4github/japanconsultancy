<?php

namespace App\Http\Controllers\Admin;

use App\Batch;
use App\ClassBatchSection;
use App\ClassRoom;
use App\ClassRoomBatch;
use App\Country;
use App\Section;
use App\Student;
use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{

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
        public function edit_class_section ($id){
            $class_section = ClassBatchSection::findOrfail($id);
            $class_room_batch = ClassRoomBatch::all();
            $section = Section::all();
            $title = 'Edit Class-Section Record | Chubi Project : Management System';
            return view('Admin.Section.edit_class_section', compact('', 'title','class_section','class_room_batch','section'));
        }
        public function update_class_section (Request $request, $id){
            $class_section = ClassBatchSection::findOrFail($id);
            $requestData = \request()->all();
            $class_section->update($requestData);
            return redirect('admin/class_section')->with('success', 'Recored Updated');
        }

    public function class_section(Request $request){
        if ($request->isMethod('get')){
            $class_section = ClassBatchSection::all();
            $class_room_batch = ClassRoomBatch::all();
            $section = Section::all();
            $title = 'Class Wise Section Record | Chubi Project : Management System';
            return view('Admin.Section.class_section',compact('','title','class_section','class_room_batch','section'));

        }
        if ($request->isMethod('post')){
            $this->validate($request, [
                'class_batch_id' => 'required',
                'section_id' => 'required',
                'shift' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
            ]);

        }

        $data['class_batch_id']=$request->class_batch_id;
        $data['section_id']=$request->section_id;
        $data['shift']=$request->shift;
        $data['start_date']=$request->start_date;
        $data['end_date']=$request->end_date;
        if (ClassBatchSection::create($data)) {
            return redirect()->back()->with('success', 'Record Saved Successfully');
        }
    }

}
