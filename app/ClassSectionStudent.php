<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSectionStudent extends Model
{
    protected $fillable = [
        'class_section_id','student_id'
    ];
    public function class_section(){
        return $this->belongsTo('App\ClassBatchSection','class_section_id');
    }
    public function student(){
        return $this->belongsTo('App\Student','student_id');
    }

}
