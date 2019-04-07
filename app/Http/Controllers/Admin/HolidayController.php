<?php

namespace App\Http\Controllers\Admin;

use App\ClassBatchSection;
use App\ClassSectionDay;
use App\Event;
use App\Holiday;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HolidayController extends Controller
{
    public function index(){
        $list_holiday = Event::orderBy('start_date','ASC')->get();
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
            'start_date' => 'required',
        ]);
        //dd(\request('start_date'));
        $datetime1 = strtotime(\request('start_date'));
       // dd($datetime1);
        $datetime2 = strtotime(\request('end_date'));
        if (\request('end_date') && \request('start_date')){
            while($datetime1 <= $datetime2) {
                $date = date('Y-m-d', $datetime1);
                $datetime1 = $datetime1 +86400;
                $holiday = Event::firstOrNew(['start_date' => $date]);
                $holiday->title = \request('title');
//                $holiday->end_date = $date;
                $holiday->save();
            }
        }else{
        $holiday = new Event();

        $holiday->title = \request('title');
        $holiday->start_date = \request('start_date');
//        $holiday->end_date = \request('end_date');
        $holiday->save();
        }
    return redirect('admin/holiday')->with('success', 'Record Saved Successfully');
    }
    public function edit($id){
        $holiday = Event::findOrFail($id);
        $title = 'Create Holiday | Chubi Project : Management System';
        return view('Admin.Holiday.edit',compact('holiday','title'));
    }
    public function update(Request $request,$id){
        $this->validate($request, [
            'title' => 'required',
            'start_date' => 'required',
        ]);

        $holiday = Event::findOrFail($id);
        $holiday->start_date = \request('start_date');
        $holiday->end_date = \request('end_date');
        $holiday->title = \request('title');
        $holiday->save();
        return redirect('admin/holiday')->with('success', 'Record Updated');
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
    public function delete($id){
        $holiday = Event::findOrFail($id);
        $holiday->delete();
        return redirect()->back()->with('success','Holiday Deleted Successfully !!');
    }
    public function calender_search(Request $request){
        return view('attendance.calendar');
    }
    public function calender(Request $request){
        return redirect('admin');
    }
}
