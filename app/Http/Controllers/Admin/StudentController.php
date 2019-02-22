<?php

namespace App\Http\Controllers\Admin;

use App\Batch;
use App\ClassBatchSection;
use App\ClassRoom;
use App\ClassRoomBatch;
use App\ClassSectionStudent;
use App\Country;
use App\ResidensalCardTime;
use App\Student;
use App\StudentOptional;
use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;

class StudentController extends Controller
{
    public function add_student(Request $request){
        if ($request->isMethod('get')){
            $class_batch = ClassRoomBatch::all();
            $countries = Country::all();
            $list_residensal = ResidensalCardTime::all();
            $subjects = Subject::where('subject_type','optional')->orderBy('name','ASC')->get();
            $title = 'Add Student Record | Chubi Project : Management System';
            return view('Admin.Student.add_new_student',compact('title','class_batch','countries','subjects','list_residensal'));

        }
        if ($request->isMethod('post')){
            $this->validate($request, [
                'residensal_card' => 'required|unique:students,residensal_card',
                'last_student_name' => 'required',
                'first_student_name' => 'required',
                'last_student_japanese_name' => 'required',
                'first_student_japanese_name' => 'required',
                'subject_optional_id' => 'required',
            ]);

        }

        $data['last_student_name']=$request->last_student_name;
        $data['first_student_name']=$request->first_student_name;
        $data['last_student_japanese_name']=$request->last_student_japanese_name;
        $data['first_student_japanese_name']=$request->first_student_japanese_name;
        $data['class_room_batch_id']=$request->class_room_batch_id;
        $data['student_number']=$request->student_number;
        $data['residensal_card']=$request->residensal_card;
        $data['student_sex']=$request->student_sex;
        $data['country_id']=$request->country_id;
        $data['date_of_birth']=$request->date_of_birth;
        $data['entry_date']=$request->entry_date;
        $data['expire_date']=$request->expire_date;
        $data['residensalCardTime']=$request->residensal_card_time;
        $data['residensal_card_expire']=$request->residensal_card_expire;
        $data['address']=$request->address;
        $data['personal_phone_number']=$request->personal_phone_number;
        $data['part_time_job_name']=$request->part_time_job_name;
        $data['phone_where_they_works']=$request->phone_where_they_works;
        $data['address_where_they_works']=$request->address_where_they_works;
        $data['nearest_station']=$request->nearest_station;
        $data['student_note']=$request->student_note;
        $data['subject_optional_id']=$request->subject_optional_id;
        $data['nearest_station1']=$request->nearest_station1;
        $data['student_of_year']=$request->student_of_year;
        $code = \request('batch_default');
        $data['unique_id']= $code.mt_rand(1000, 9999);


//        $data['subjectc_id']=$request->subjectc_id;
//        $data['subjecto_id']=$request->subjecto_id;

        if (($request->hasFile('photo'))) {
            $image = $request->file('photo');
            $ext = $image->getClientOriginalExtension();

            $imageName = (microtime()) . '.' . $ext;
            $uploadPath = public_path('photos/');
            if ($image->move($uploadPath, $imageName)) {
                $data['photo'] = $imageName;
            }
        }

        if ($student = Student::create($data)) {
             $student->unique_id = $student->unique_id.$student->id;
             $student->save();
            return redirect('admin/list_student')->with('success', 'Record Saved Successfully');
        }
    }
    public function list_student(Request $request){
        if ($request->isMethod('get')) {
            $list_students = Student::orderBy('student_number','ASC')->paginate(10);
            $title = 'Student Record | Chubi Project : Management System';
            return view('Admin.Student.list_student', compact( 'title','list_students','count'));
        }
        if ($request->isMethod('post')){

        }


        }
    public function edit_student($id){
            $student = Student::findOrfail($id);
            $class_batch = ClassRoomBatch::all();
            $countries = Country::all();
            $opt_subject = Subject::where('subject_type','optional')->get();
            $list_residensal = ResidensalCardTime::all();
            $title = 'Edit Student Record | Chubi Project : Management System';
            return view('Admin.Student.edit_new_student', compact( 'title','student','class_batch','countries','list_residensal','opt_subject'));
        }
    public function update_student(Request $request, $id){
        $list_student = Student::findOrFail($id);
        $list_student->last_student_name = \request('last_student_name');
        $list_student->first_student_name = \request('first_student_name');
        $list_student->last_student_japanese_name = \request('last_student_japanese_name');
        $list_student->first_student_japanese_name = \request('first_student_japanese_name');
        $list_student->class_room_batch_id = \request('class_room_batch_id');
        $list_student->student_number = \request('student_number');
        $list_student->residensal_card = \request('residensal_card');
        $list_student->student_sex = \request('student_sex');
        $list_student->country_id = \request('country_id');
        $list_student->date_of_birth = \request('date_of_birth');
        $list_student->entry_date = \request('entry_date');
        $list_student->expire_date = \request('expire_date');
        $list_student->residensalCardTime = \request('residensalCardTime');
        $list_student->residensal_card_expire = \request('residensal_card_expire');
        $list_student->address = \request('address');
        $list_student->personal_phone_number = \request('personal_phone_number');
        $list_student->part_time_job_name = \request('part_time_job_name');
        $list_student->phone_where_they_works = \request('phone_where_they_works');
        $list_student->address_where_they_works = \request('address_where_they_works');
        $list_student->nearest_station = \request('nearest_station');
        $list_student->nearest_station1 = \request('nearest_station1');
        $list_student->student_of_year = \request('student_of_year');
        $list_student->student_note = \request('student_note');
        $list_student->subject_optional_id = \request('subject_optional_id');
        if($request->hasFile('photo')){
            if (is_file(url('public/photos').'/'.$list_student->photo) && file_exists(url('public/photos').'/'.$list_student->photo)){
                unlink(url('public/photos').'/'.$list_student->photo);
            }
            $filename = time().'.'.request()->file('photo')->getClientOriginalExtension();

            $filename = md5(microtime()) . '.' . $filename;

            request()->file('photo')->move('public/photos/',$filename);
            $list_student->photo =$filename;
        }

        $list_student->save();
         return redirect('admin/list_student')->with('success', 'Record Updated');
        }

    public function destroy($id){
        $listStudents = Student::findOrFail($id);

        $listStudents->delete();

        return redirect()->back()->with('success', 'Record Deleted');

    }
    public function id_preview($id){
        $student = Student::findOrFail($id);

        $title = 'Student Id Card | Chubi Project : Management System';
        return view('Admin.Student.id_preview', compact( 'title','student'));
    }
    public function export_pdf($id)
    {
        $student = Student::findOrFail($id);
        $pdf = PDF::loadView('Admin.Student.id_preview',compact('student'));
        return $pdf->download('id_card.pdf');
    }


    public function section_wise_student(Request $request){
        if ($request->isMethod('get')){
            $class_section = ClassBatchSection::all();
            $Students = Student::all();
            $classSectionStuden = ClassSectionStudent::all();
            $title = 'Section Wise Record | Chubi Project : Management System';
            return view('Admin.Student.section_wise_student',compact('Students','title','class_section','classSectionStuden'));

        }
        if ($request->isMethod('post')){
            $this->validate($request, [
                'class_section_id' => 'required',
                'student_id' => 'required|unique:class_section_students,student_id',
            ]);


        }

        foreach (\request('student_id')as $key => $value){
            $classSectionS = ClassSectionStudent::firstOrNew(['student_id'=>$value,'class_section_id'=>$request->class_section_id]);
            $classSectionS->save();
        }
        return redirect()->back()->with('success', 'Record Saved Successfully');
    }

}
