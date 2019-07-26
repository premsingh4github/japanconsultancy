<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function getLogin(){
        if (Auth::check()){
            if (Auth::user()->role_id == 1) {
                return redirect('admin');
            }
            if (Auth::user()->role_id == 2) {
                return redirect('staff');
            }
        }
        return view('auth.login');
    }
    public function postLogin(){
//        google captcha validating
//        if(!check_recaptcha()){
//            Session::flash('error_message','Incorrect captcha entered');
//            return redirect()->back()->withInput(request()->except('password'));
//        }
        $this->validate(request(),[
            'email'=>'required',
            'password'=>'required'
        ]);
        $field = filter_var(request('email'),FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        if (Auth::attempt([$field => request('email'), 'password' => request('password')])) {
            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return redirect('admin');
                }
                if (Auth::user()->role_id == 2) {
                    return redirect('staff');
                }
            }
        }
        return redirect('login')->withErrors(['email'=>'Invalid credentail'])->withInput(request()->only('email'));
    }

    public function test()
    {
        ini_set('memory_limit', '-1');
        $attendance = null;
        Attendance::chunk(50,function ($attendances){
            $i = 0;
            foreach ($attendances as $attendance):

                $attendance->type = '1';
                $attendance->attendance_for = date('Y-m-d',strtotime($attendance->created_at));
                $attendance->save();
                $i += 1;
            endforeach;


        });


    }

    public function updateType()
    {
        $attendance_days = Attendance::groupBy('attendance_for')->orderBy('attendance_for')->where('attendance_for','>=','2019-06-04')->where('attendance_for','<=',date('Y-m-d'))->get();
        foreach ($attendance_days as $days){
            $attendaces = Attendance::where('attendance_for',$days->attendance_for)->groupBy('student_id')->orderBy('student_id')->chunk(100,function ($students){
                foreach ($students as $student){
                    $same_attendaces = Attendance::where('attendance_for',$student->attendance_for)->where('student_id',$student->student_id)->get();
                    $i = 0;
                    foreach ($same_attendaces as $s_attendace){
                        if($i == 0){

                            if ($s_attendace->type==2){
                                $s_attendace->type = 2;
                                $s_attendace->save();
                            }else{
                                $s_attendace->type = '1';
                                $s_attendace->save();
                            }

                        }
                        elseif ($i == count($same_attendaces) - 1) {

                            $s_attendace->type = '2';
                            $s_attendace->save();
                        }
                        else{
                            $s_attendace->delete();
                        }
                        $i +=1;
                    }

                }
            });
        }
        return redirect('admin/report_batch_wise');
    }
    public function cal(){
        $events = Event::all();
        foreach ($events as $event){
            $event->end_date = $event->start_date;
            $event->save();
        }
        return redirect('login');

    }

}
