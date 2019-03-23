<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'last_teacher_name','first_teacher_name','last_teacher_japanese_name','first_teacher_japanese_name','country_id','subject_id','teacher_number','date_of_birth','address','personal_phone_number1','personal_phone_number2','personal_phone_number3','photo',
    ];
}
