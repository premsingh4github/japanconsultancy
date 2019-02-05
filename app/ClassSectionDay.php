<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSectionDay extends Model
{
    protected $fillable = [
        'class_section_id','day'
    ];
    public function class_section(){
        return $this->belongsTo('App\ClassBatchSection','class_section_id');
    }

}
