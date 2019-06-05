<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marksheet extends Model
{
    public function marks(){
        return $this->belongsTo(Markrank::class,'marks_id');
    }
}
