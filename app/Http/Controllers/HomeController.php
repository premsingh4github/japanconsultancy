<?php

namespace App\Http\Controllers;

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


}
