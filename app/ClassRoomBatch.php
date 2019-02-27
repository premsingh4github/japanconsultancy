<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassRoomBatch extends Model
{
    protected $fillable = [
        'class_room_id','batch_id'
    ];
    public function class_room(){
        return $this->belongsTo('App\ClassRoom','class_room_id');
    }
    public function batch(){
        return $this->belongsTo('App\Batch','batch_id');
    }
    public function students(){
        return $this->hasMany('App\Student','class_room_batch_id');
    }
    public function class_batch_section(){
        return $this->hasMany('App\ClassBatchSection','class_batch_id');
    }
    public function class_batch_subject(){
        return $this->hasMany('App\ClassBatchSubject','class_batch_id');
    }


}
