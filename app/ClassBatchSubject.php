<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassBatchSubject extends Model
{
    protected $fillable = [
        'class_batch_id','subject_id',
    ];
    public function class_room_batch(){
        return $this->belongsTo('App\ClassRoomBatch','class_batch_id');
    }
    public function subjects(){
        return $this->belongsTo('App\Subject','subject_id');
    }
}
