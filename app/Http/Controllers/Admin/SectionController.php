<?php

namespace App\Http\Controllers\Admin;

use App\Batch;
use App\ClassBatchSection;
use App\ClassBatchSectionPeriod;
use App\ClassRoom;
use App\ClassRoomBatch;
use App\Country;
use App\Period;
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
    public function section_period(){
        $title = 'Section Wise Period';
        $periods = Period::orderBy('name','ASC')->get();
        $classBatchSections = ClassBatchSection::orderBy('id','ASC')->get();
        $class_batch_section_periods = ClassBatchSectionPeriod::all();
         return view('Admin.Section.section_period',compact('title','periods','classBatchSections','class_batch_section_periods'));
    }
    public function section_period_post(Request $request){
        $this->validate($request, [
            'c_b_s_id' => 'required',
            'period_id' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
        ]);

        $class_section_period = new ClassBatchSectionPeriod();
        $class_section_period->c_b_s_id = $request->c_b_s_id;
        $class_section_period->period_id = $request->period_id;
        $class_section_period->start_at = $request->start_at;
        $class_section_period->end_at = $request->end_at;
        $class_section_period->save();
        return redirect()->back()->with('success','Record Seved Successfully !!');

    }

    public function edit_class_section_period($id){
        $class_section_period = Period::findOrfail($id);
        $class_room_batch = ClassRoomBatch::all();
        $section = Section::all();
        $title = 'Edit Class-Section Record | Chubi Project : Management System';
        return view('Admin.Section.edit_class_section_period', compact('', 'title','class_section_period','class_room_batch','section'));
    }

}
