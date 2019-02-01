<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;
use App\Client\Client;
class Country extends Model
{
    protected $fillable = [
        'name',
    ];
    public function students(){
        return $this->hasMany('App\Student');
    }

}
