<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Quiz extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable=['title','description',  'passing_score', 'duration', 'status', 'slug'];
    protected $dates=['finished_at'];
    protected $appends = ['details'];


    public function getDetailsAttribute(){
        if($this->results()->count()>0){
            return [
                'average'=>round($this->results()->get()->avg('score')),
                'join_count'=>$this->results()->get()->where('user_id')->count(),
            ];
        }
        return null;
    }

    public function results(){
        return $this->hasMany('App\Models\Result');
    }

    public function descResults(){
        return $this->results()->orderBy('score', 'desc');
    }
    public function ascResults(){
        return $this->results()->orderBy('score', 'asc');
    }



    public function my_result(){
        return $this->hasOne('App\Models\Result')->where('user_id', auth()->user()->id);
    }
    public function questions(){
        return $this->hasMany('App\Models\Question');
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'onUpdate' => true,
                'source' => 'title'
            ]
        ];
    }
}
