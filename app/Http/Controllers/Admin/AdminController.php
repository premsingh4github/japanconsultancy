<?php

namespace App\Http\Controllers\Admin;

use App\ClassRoomBatch;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

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
        $batch = ClassRoomBatch::withCount('students')->orderBy('students_count','DESC')->get();
        return view('Admin.dashboard',compact('batch'));
    }


}
