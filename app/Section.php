<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'name',
    ];
    public function students(){
        return $this->hasMany('App\Student');
    }
    public function class_batch_section(){
        return $this->hasMany('App\ClassBatchSection','section_id');
    }

}
