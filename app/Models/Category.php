<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'type'
    ];
    public function projects(){
        return $this->hasMany('App\Models\Project','category_id','id');
    }

    public function scopeSeen($query, $value){
        return $query->where('seen', $value);
    }

}
