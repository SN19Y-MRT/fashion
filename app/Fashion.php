<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Fashion extends Model 
{
        protected $fillable = [
        'fashionName',
        'fashionOverview',
        'category_id',
        'syuunou',
        'user_id',
        
    ];
    
    
    
    public function getByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
        public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
