<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $dates = ['deadline'];

    protected $fillable = [
        "title",
        "detail",
        "category",
        "deadline",
        "priority",
        "time_required"
    ];

    public function project(){
        return $this->belongsTo("App\Project");
    }
}
