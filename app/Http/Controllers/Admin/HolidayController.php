<?php

namespace App\Http\Controllers\Admin;

use App\ClassBatchSection;
use App\ClassSectionDay;
use App\Holiday;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HolidayController extends Controller
{
    public function index(){
        $list_holiday = Holiday::orderBy('date','ASC')->get();
        $title = 'Holiday Manager | Chubi Project : Management System';
        return view('Admin.Holiday.index',compact('title','list_holiday'));
    }
    public function create(){
        $title = 'Create Holiday | Chubi Project : Management System';
        return view('Admin.Holiday.create',compact('title'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'date' => 'required',
        ]);
        $holiday = new Holiday();
        $holiday->title = \request('title');
        $holiday->date = \request('date');
        $holiday->description = \request('description');
        $holiday->save();
    return redirect('admin/holiday')->with('success', 'Record Saved Successfully');
    }
    public function edit($id){
        $holiday = Holiday::findOrFail($id);
        $title = 'Create Holiday | Chubi Project : Management System';
        return view('Admin.Holiday.edit',compact('holiday','title'));
    }
    public function update($id){
        $holiday = Holiday::findOrFail($id);
        $holiday->date = \request('date');
        $holiday->title = \request('title');
        $holiday->description = \request('description');
        $holiday->save();
        return redirect('admin/holiday')->with('success', 'Recored Updated');
    }

    public function section_day(){
        $section_days = ClassSectionDay::all();
        $title = 'Section Wise Days | Chubi Project : Management System';
        return view('Admin.Holiday.section_day',compact('section_days','title'));
    }
    public function new_section_day(){
        $class_section = ClassBatchSection::all();
        $title = 'Add Section Wise Days | Chubi Project : Management System';
        return view('Admin.Holiday.new_section_day',compact('class_section','title'));
    }
    public function post_section_wise_days(Request $request){
        $this->validate($request, [
            'day' => 'required',
            'class_section_id' => 'required',
        ]);
        $sections = new ClassSectionDay();
        $sections->day = \request('day');
        $sections->class_section_id = \request('class_section_id');
        $sections->save();
        return redirect('admin/section_day')->with('success', 'Record Saved Successfully');
    }
}
