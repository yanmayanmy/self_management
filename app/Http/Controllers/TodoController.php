<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Schedule;
use App\Models\Task;
use App\Calendar\CalendarView;
use DateTime;

class TodoController extends Controller
{
    function index(){
        $projects = Project::all();
        $schedules = Schedule::all();
        $tasks = Task::all();

        //render to calendar
        $todos =[
            "projects" => $projects,
            "schedules" => $schedules,
            "tasks" => $tasks,
        ];

        $time = new DateTime('now');
        $calendar = new CalendarView($time, $todos);
        return view('todos.index', compact("projects", "schedules", "tasks", "calendar"));
    }


    public function create(){
        return view('todos.create');
    }
}
