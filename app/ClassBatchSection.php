<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassBatchSection extends Model
{
    protected $fillable = [
        'class_batch_id','section_id','shift','start_date','end_date'
    ];
    public function class_room_batch(){
        return $this->belongsTo('App\ClassRoomBatch','class_batch_id');
    }
    public function class_section(){
        return $this->belongsTo('App\Section','section_id');
    }

    public function class_section_students()
    {
      return $this->hasMany(ClassSectionStudent::class,'class_section_id');
    }

    public function class_batch_section_periods()
    {
       return $this->hasMany(ClassBatchSectionPeriod::class,'c_b_s_id');
    }



}
