<?php

namespace App\Http\Controllers\Admin;

use App\ClassRoomBatch;
use App\Event;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use MaddHatter\LaravelFullcalendar\Calendar;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = [];
        $data = Event::all();
        if($data->count()){
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day')
                );
            }
        }
        $calendar = \MaddHatter\LaravelFullcalendar\Facades\Calendar::addEvents($events);
        $batch = ClassRoomBatch::withCount('students')->orderBy('students_count','DESC')->get();
        return view('Admin.dashboard',compact('batch','calendar'));
    }
}
