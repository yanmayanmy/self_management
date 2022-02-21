<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    protected $dates = ['deadline'];

    protected $fillable = [
        "title",
        "detail",
        "category",
        "deadline",
        "priority",
    ];

    public function schedules(){
        return $this->hasMany("App\Schedule");
    }

    public function tasks(){
        return $this->hasMany("App\Task");
    }

}
