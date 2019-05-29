<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeDuration extends Model
{
    public function grade(){
        return $this->belongsTo(Grade::class,'grade_id');
    }
}
