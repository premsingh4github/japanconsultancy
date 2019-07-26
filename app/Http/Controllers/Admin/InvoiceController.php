<?php

namespace App\Http\Controllers\Admin;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function student_invoice($id){
        $student = Student::findOrFail($id);

        $title = 'Invoice | Chubi Project : Management System';
        return view('Admin.Student.student_invoice', compact( 'title','student'));
    }

}
