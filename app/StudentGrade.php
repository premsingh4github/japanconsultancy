<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentGrade extends Model
{
    protected $fillable=['student_id','grade_id'];
    public function grade(){
        return $this->belongsTo(GradeDuration::class,'grade_id');
    }
    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
}
