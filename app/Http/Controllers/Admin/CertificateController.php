<?php

namespace App\Http\Controllers\Admin;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificateController extends Controller
{
//    public function graduation_prospect_certificate(Request $request){
//        if ($request->isMethod('get')){
//            return view('Admin.Student.graduation_prospect_certificate');
//        }
//
//    }

    public function graduation_prospect_certificate($id){
        $student = Student::findOrFail($id);

        $title = 'Student Id Card | Chubi Project : Management System';
        return view('Admin.Student.graduation_prospect_certificate', compact( 'title','student'));
    }
    public function Graduation_certificate($id){
        $student = Student::findOrFail($id);

        $title = 'Student Id Card | Chubi Project : Management System';
        return view('Admin.Student.Graduation_certificate', compact( 'title','student'));
    }
    public function certificate_of_student_status($id){
        $student = Student::findOrFail($id);

        $title = 'Student Id Card | Chubi Project : Management System';
        return view('Admin.Student.certificate_of_student_status', compact( 'title','student'));
    }
}
