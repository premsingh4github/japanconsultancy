<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MaddHatter\LaravelFullcalendar\Calendar;

class CalendarController extends Controller
{
    public function index(){
        $title = 'Calendar - Admin-Panel - Chubi Management System';
        if (\request('year')){
            return view('Admin.Report.calendar.view',compact('calendar'));
        }
        return view('Admin.Report.calendar.index',compact('title'));
    }
}
