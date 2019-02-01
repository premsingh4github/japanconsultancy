<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentOptional extends Model
{
    protected $fillable = [
        'class_section_student_id','subject_id',
    ];
    public function subjects(){
        return $this->belongsTo('App\Subject','subject_id');
    }
    public function class_section_student(){
        return $this->belongsTo('App\ClassSectionStudent','class_section_student_id');
    }

}
