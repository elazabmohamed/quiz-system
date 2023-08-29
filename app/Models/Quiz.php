<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable=['title','description', 'finished_at', 'passing_score', 'duration', 'status'];
    public function questions(){
        return $this->hasMany('App\Models\Question');
    }
}
