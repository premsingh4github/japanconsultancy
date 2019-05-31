<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\GradeDuration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MaddHatter\LaravelFullcalendar\Calendar;

class CalendarController extends Controller
{
    public function index(){
        ini_set('max_execution_time',1200);
        $title = 'Calendar - Admin-Panel - Chubi Management System';
        $grades = GradeDuration::all();
        if (\request('grade_id')){
            $grade = GradeDuration::findOrFail(\request('grade_id'));
            $start = $grade->start_at;
            $end = $grade->end_at;
            $year = $grade->year;
            $months = array();
            $date1 = strtotime($start);
            $date2 = strtotime($end);
//            for ($i = 0; $i < 12; $i++) {
//                $timestamp = mktime(0, 0, 0, date('n',strtotime($start)) + $i, 1);
//                $months[date('n', $timestamp)] = date('F', $timestamp);
//            }

            return view('Admin.Report.calendar.view',compact('start','end','title','year','months','date1','date2'));
        }
        return view('Admin.Report.calendar.index',compact('title','grades'));
    }
}
