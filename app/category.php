<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $fillable=['id','name'];

    public function prodcut(){

        return $this->hasMany('App\Product');

    }

}
