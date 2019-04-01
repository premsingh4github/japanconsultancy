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
    return $this->belongsTo('App\ResidensalCardTime','residensalCardTime');
}
    public function subject(){
    return $this->belongsTo(Subject::class,'subject_optional_id');
}
//    public function classBatchSections()
//    {
//        return $this->belongsToMany(ClassBatchSection::class,'class_section_students');
//    }
    public function classBatchSections()
    {
        return $this->belongsToMany(ClassBatchSection::class,'class_section_students');
    }

    public function classSections()
    {
        return $this->hasMany(ClassSectionStudent::class);
    }

    public function present($period,$class_bath_section,$day)
    {
        if(Event::where('start_date',$day)->count() > 0){
            return 'H';
        }
        if(Event::where('end_date',$day)->count() > 0 ){
            return 'H';
        }
        if($class_bath_section->shift =='morning'){
//            switch ($period){
//                case 1:
//
//                    break;
//                case 2:
//                    break;
//                case 3;
//                    break;
//                case 4:
//                    break;
//                default:
//                    continue;
//            }
        }else{

        }
        if((Attendance::where('student_id',$this->id)->whereBetween('updated_at',array($day.' 00:00:00',$day.' 23:59:59',))->count())==1){
            return "P" ;
        }
        elseif((Attendance::where('student_id',$this->id)->whereBetween('updated_at',array($day.' 00:00:00',$day.' 23:59:59',))->count())>1){
            return "F" ;
        }
        elseif((Attendance::where('student_id',$this->id)->whereBetween('updated_at',array($day.' 00:00:00',$day.' 23:59:59',))->count())==0){
            return "A";
        }


//        if(Attendance::where('student_id',$this->id)->whereBetween('updated_at',array($day.' 00:00:00',$day.' 23:59:59',))->count()){
//            return "P" ;
//        }else{
//            return "A";
//        }

    }

}

