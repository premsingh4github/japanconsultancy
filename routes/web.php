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



//Route::get('/home', 'HomeController@index')->name('home');
Route::any('logout', 'Auth\LoginController@logout')->name('logout');


/* ========================================= ADMIN CONTROL START====================================================================== */
Route::group(['middleware'=>'admin','prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('','AdminController@index');
    Route::any('add_student','StudentController@add_student');
    Route::any('list_student','StudentController@list_student');
    Route::get('list_student/student_id={id}','StudentController@edit_student');
    Route::post('list_student/student_id={id}','StudentController@update_student');
    Route::get('list_student/student_id={id}/delete','StudentController@destroy');
    Route::get('list_student/{id}','StudentController@id_preview');


    Route::any('section_wise_student','StudentController@section_wise_student');


    Route::any('add_record','ClassBatchController@add_record');
    Route::any('list_record','ClassBatchController@list_record');
    Route::post('post_class_record','ClassBatchController@post_class_record');
    Route::post('post_batch_record','ClassBatchController@post_batch_record');
    Route::post('post_classbatch_record','ClassBatchController@post_classbatch_record');


    Route::any('add_subject','SubjectController@add_subject');
    Route::any('list_subject','SubjectController@list_subject');
    Route::get('list_subject/subject_id={id}','SubjectController@edit_subject');
    Route::post('list_subject/subject_id={id}','SubjectController@update_subject');

    Route::any('batch_wise_subject','SubjectController@batch_wise_subject');


    Route::any('add_section','SectionController@add_section');
    Route::any('list_section','SectionController@list_section');
    Route::get('list_section/section_id={id}','SectionController@edit_section');
    Route::post('list_section/section_id={id}','SectionController@update_section');

    Route::any('class_section','SectionController@class_section');




});
/* ================================================ ADMIN CONTROL END============================================================== */

/* ========================================= USER CONTROL START====================================================================== */
Route::group(['middleware'=>'staff','prefix'=>'staff','namespace'=>'Staff'],function(){
    Route::get('','StaffController@index');
});
/* ================================================ ADMIN CONTROL END============================================================== */
