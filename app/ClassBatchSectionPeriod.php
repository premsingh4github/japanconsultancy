<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassBatchSectionPeriod extends Model
{
    protected $fillable=[
        'c_b_s_id','period_id','start_at','end_at',
    ];
    public function classBatchSection(){
        return $this->belongsTo(ClassBatchSection::class,'c_b_s_id');
    }
    public function period(){
        return $this->belongsTo(Period::class,'period_id');
    }
}
