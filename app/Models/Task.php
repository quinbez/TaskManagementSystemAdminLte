<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Task extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'project_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'status',
        'on_progress',
        'completed',
        'seen'
    ];

    protected static function boot(){
        parent::boot();
        static::addGlobalScope('order', function(Builder $builder){
            $builder->orderBy('created_at', 'desc');
        });
    }

    public function member(){
        return $this->belongsTo('App\Models\User', 'user_id','id');
    }
    public function project(){
        return $this->belongsTo('App\Models\Project', 'project_id','id');
    }

    public function scopeSeen($query, $value){
        return $query->where('seen', $value);
    }

    public function scopeOnProgress($query, $value){
        return $query->where('on_progress', $value);
    }
    public function scopeCompleted($query, $value){
        return $query->where('completed', $value);
    }
}
