<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function fashions()   
    {
        return $this->hasMany('App\Fashion');  
    }


    public function getByCategory(int $limit_count = 5)
    {
         return $this->fashions()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
