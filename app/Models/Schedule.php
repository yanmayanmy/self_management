<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $dates = [
        'start_time',
        'end_time'
    ];

    protected $fillable = [
        "title",
        "detail",
        "category",
        "start_time",
        "end_time",
        "priority"
    ];

    public function project(){
        return $this->belongsTo("App\Project");
    }
}
