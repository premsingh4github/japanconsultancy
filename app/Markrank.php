<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Markrank extends Model
{
    public function marksheets(){
        return $this->hasMany(Marksheet::class,'marks_id');
    }
}
