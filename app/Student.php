<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=['last_student_name','student_of_year','nearest_station1','first_student_name','class_room_batch_id','student_number','photo','last_student_japanese_name','first_student_japanese_name','residensal_card','student_sex','country_id','date_of_birth','entry_date','residensalCardTime','residensal_card_expire','address','personal_phone_number','part_time_job_name','phone_where_they_works','address_where_they_works','nearest_station','unique_id','student_note','expire_date','subject_optional_id'];

    public function class_room_batch(){
    return $this->belongsTo('App\ClassRoomBatch');
}
    public function country(){
    return $this->belongsTo('App\Country');
}
    public function residensal(){
    return $this->belongsTo(ResidensalCardTime::class,'residensalCardTime');
}
    public function subject(){
    return $this->belongsTo(Subject::class,'subject_optional_id');
}
//    public function classBatchSections()
//    {
//        return $this->belongsToMany(ClassBatchSection::class,'class_section_students');
//    }

}

