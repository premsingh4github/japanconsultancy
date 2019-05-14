<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@getLogin');

//Auth::routes();


Route::group(['middleware'=>'guest'],function(){
    Route::get('login','HomeController@getLogin')->name('login');
    Route::post('login','HomeController@postLogin');
});

Route::get('lang/{locale}', 'LocalizationController@index');

//Route::get('/home', 'HomeController@index')->name('home');
Route::any('logout', 'Auth\LoginController@logout')->name('logout');


/* ========================================= ADMIN CONTROL START====================================================================== */
Route::group(['middleware'=>'admin','prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('lang/{locale}', 'LocalizationController@index');
    Route::get('','AdminController@index');
    Route::any('add_student','StudentController@add_student');
    Route::any('first_immigration','StudentController@first_immigration');
    Route::any('second_immigration','StudentController@second_immigration');
    Route::any('list_student','StudentController@list_student');
    Route::get('list_student/student_id={id}/remarks','StudentController@edit_student_remarks');
    Route::post('list_student/student_id={id}/remarks','StudentController@update_student_remarks');

    Route::get('list_student/student_id={id}','StudentController@edit_student');
    Route::post('list_student/student_id={id}','StudentController@update_student');
    Route::get('list_student/student_id={id}/delete','StudentController@destroy');
    Route::get('list_student/student_id={id}/confirm_destroy','StudentController@confirm_destroy');
    Route::get('list_student/{id}','StudentController@id_preview');
    Route::get('list_student/pdf/{id}','StudentController@export_pdf');
    Route::get('list_student/{id}/report','StudentController@student_report');

    Route::any('add_teacher','TeacherController@add_teacher');
    Route::get('list_teacher','TeacherController@list_teacher');
    Route::get('list_teacher/teacher_id={id}','TeacherController@edit_teacher');
    Route::get('list_teacher/teacher_id={id}','TeacherController@edit_teacher');
    Route::get('list_teacher/teacher_view={id}','TeacherController@view_teacher');
    Route::post('list_teacher/teacher_id={id}','TeacherController@update_teacher');


    Route::any('section_wise_student','StudentController@section_wise_student');
    Route::any('section_wise_student_edit','StudentController@section_wise_student_edit');
    Route::get('section_wise_student_edit/{id}/edit','StudentController@section_wise_student_editing');
    Route::post('section_wise_student_edit/{id}/edit','StudentController@section_wise_student_update');
    Route::get('section_wise_student_edit/{id}/delete','StudentController@section_wise_student_delete');

    Route::any('add_record','ClassBatchController@add_record');
    Route::any('list_record','ClassBatchController@list_record');
    Route::get('list_record/{id}/edit_class_room','ClassBatchController@edit_class_room');
    Route::post('list_record/{id}/edit_class_room','ClassBatchController@update_class_room');


    Route::post('post_class_record','ClassBatchController@post_class_record');
    Route::post('post_batch_record','ClassBatchController@post_batch_record');
    Route::post('post_classbatch_record','ClassBatchController@post_classbatch_record');


    Route::any('add_subject','SubjectController@add_subject');
    Route::any('list_subject','SubjectController@list_subject');
    Route::get('list_subject/subject_id={id}','SubjectController@edit_subject');
    Route::post('list_subject/subject_id={id}','SubjectController@update_subject');

    Route::any('batch_wise_subject','SubjectController@batch_wise_subject');

/*==============================Residensal Section===================*/
    Route::any('add-residensal','ResidensalCardTimeController@add_residensal');
    Route::any('list-residensal','ResidensalCardTimeController@list_residensal');
    Route::get('list-residensal={id}','ResidensalCardTimeController@edit_residensal');
    Route::post('list-residensal={id}','ResidensalCardTimeController@update_residensal');
    /*==============================Residensal Section===================*/


    Route::any('add_section','SectionController@add_section');
    Route::any('list_section','SectionController@list_section');
    Route::get('list_section/section_id={id}','SectionController@edit_section');
    Route::post('list_section/section_id={id}','SectionController@update_section');
    
    Route::get('class_section/section_id={id}','SectionController@edit_class_section');
    Route::post('class_section/section_id={id}','SectionController@update_class_section');

    Route::any('class_section','SectionController@class_section');
    Route::get('section_period','SectionController@section_period');
    Route::post('section_period','SectionController@section_period_post');

    Route::get('section_period/section_period_id={id}','SectionController@edit_class_section_period');
    Route::post('section_period/section_period_id={id}','SectionController@update_class_section_period');

    Route::any('holiday','HolidayController@index');
    Route::any('new_holiday','HolidayController@create');
    Route::any('post_holiday','HolidayController@store');
    Route::any('holiday/edit={id}','HolidayController@edit');
    Route::post('holiday/edit={id}','HolidayController@update');
    Route::get('holiday/delete={id}','HolidayController@delete');

    Route::any('section_day','HolidayController@section_day');
    Route::any('new_section_day','HolidayController@new_section_day');
    Route::post('post_section_wise_days','HolidayController@post_section_wise_days');


    /*================= calender export======================*/
    Route::post('calendar','HolidayController@calender_search');
    Route::get('calendar','HolidayController@calender');
    /*================= calender export======================*/

    
     /*==================graduation_prospect_certificate=======*/
    Route::get('graduation_prospect_certificate/{id}','CertificateController@graduation_prospect_certificate');
    Route::get('Graduation_certificate/{id}','CertificateController@Graduation_certificate');
    Route::get('certificate_of_student_status/{id}','CertificateController@certificate_of_student_status');
    /*==================graduation_prospect_certificate=======*/

     /*==================Report-Section=======*/
    Route::get('attendance_report','ReportController@index');
    Route::post('attendance_report','ReportController@view');
    Route::get('attendance_report/{section}/{id}/{from_date}/{to_date}','ReportController@getattendacelist');

    Route::get('report_batch_wise','ReportController@report_batch_wise');

    Route::get('view_calendar','CalendarController@index');
    /*==================Report-Section=======*/
});
/* ================================================ ADMIN CONTROL END============================================================== */

/* ========================================= USER CONTROL START====================================================================== */
Route::group(['middleware'=>'staff','prefix'=>'staff','namespace'=>'Staff'],function(){
    Route::get('','StaffController@index');
});
/* ================================================ ADMIN CONTROL END============================================================== */

Route::get('attendance','AttendanceController@index')->middleware('auth');
Route::get('attendance_form','AttendanceController@attendance_form')->middleware('auth');
Route::get('attendance/{code}','AttendanceController@store')->middleware('auth');
Route::get('attendance_list','AttendanceController@show')->middleware('auth');
Route::get('getattendacelist/{section}/{id}','AttendanceController@getattendacelist')->middleware('auth');
Route::get('section_attendance_excel','AttendanceController@getAttendanceExcel');
Route::get('test','HomeController@test');
Route::get('admin/manage_attendance','AttendanceController@getAttendance')->middleware('admin');
Route::post('admin/manage_attendance','AttendanceController@postAttendance')->middleware('admin');
Route::get('admin/manage_attendance/{id}','AttendanceController@make_absent')->middleware('auth');
Route::get('admin/get_students/{class_batch_section_id}','AttendanceController@getStudents')->middleware('admin');

Route::get('getattendace/{code}','AttendanceController@getattendace');
//Route::get('test','HomeController@test');
Route::get('days','HomeController@updateType')->middleware('admin');

Route::post('exist_attend_update/{id}','AttendanceController@exist_attend_update')->middleware('admin');
Route::post('new_attend_entry/{attend}/{period}','AttendanceController@new_attend_entry')->middleware('admin');
Route::post('get_new_attend/{period_time}/{period}/{student}','AttendanceController@get_new_attend')->middleware('admin');
