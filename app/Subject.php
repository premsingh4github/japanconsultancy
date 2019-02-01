<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name','subject_type',
    ];
    public function students(){
        return $this->hasMany('App\Student');
    }
    public function class_batch_subjects(){
        return $this->hasMany('App\ClassBatchSubject','subject_id');
    }
    public function class_student_optional(){
        return $this->hasMany('App\StudentOptional','subject_id');
    }

}
