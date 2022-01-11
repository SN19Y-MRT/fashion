<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function fashions()   
{
    return $this->hasMany('App\fashion');  
}
}
