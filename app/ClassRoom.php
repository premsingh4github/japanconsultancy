<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $fillable = [
        'name',
    ];
    public function class_room_batches(){
        return $this->hasMany('App\ClassRoomBatch');
    }


}
