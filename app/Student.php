<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=['last_student_name','first_student_name','class_room_batch_id','student_number','photo','last_student_japanese_name','first_student_japanese_name','residensal_card','student_sex','country_id','date_of_birth','entry_date','residensal_card_time','residensal_card_expire','address','personal_phone_number','part_time_job_name','phone_where_they_works','address_where_they_works','nearest_station','unique_id','student_note','expire_date','subject_optional_id'];

    public function class_room_batch(){
    return $this->belongsTo('App\ClassRoomBatch');
}
    public function country(){
    return $this->belongsTo('App\Country');
}

}

