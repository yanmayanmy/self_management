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
        return $this->hasMany("App\Models\Schedule");
    }

    public function tasks(){
        return $this->hasMany("App\Models\Task");
    }


    /**
     * Collect all tasks and schedules related to the project 
     * and sort by deadline or start time in order to show in the project map.
     * 
     * @param Project $project
     * @return array|string
     */
    public function sort_milestones(Project $project){
        $tasks = $project->tasks;
        $schedules = $project->schedules;
        $todos = [];

        foreach($tasks as $task){
            $todos[] = [
                "id" => $task->id,
                "title" => $task->title,
                "deadline" => $task->deadline->format("Y-M-d"),
                "type" => "task", // reference used in project map
            ];
        }

        foreach($schedules as $schedule){
            $todos[] = [
                "id" => $Schedule->id,
                "title" => $schedule->title,
                "start_time" => $schedule->start_time->format("Y-M-d"),
                "end_time" => $schedule->end_time->format("Y-M-d"),
                "type" => "schedule",
            ];
        }

        foreach($todos as $key => $todo){
            if(isset($todo['deadline'])){
                $sort_keys[$key] = $todo['deadline'];
            }else{
                $sort_keys[$key] = $todo['start_time'];
            }
        }

        array_multisort($sort_keys, SORT_ASC, $todos);

    
        return $todos;
    }
}
