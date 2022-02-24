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
        $time = new DateTime('now');

        $thisMonth = $time->format("m");

        // Get limited number of Todos to show in the index page.(I'm assuming that this should be written in models.)
        $projects = Project::whereMonth('deadline', $thisMonth)    
            ->orderBy('deadline', 'asc')
            ->limit(3)
            ->get();
        $schedules = Schedule::whereMonth('start_time', $thisMonth)    
            ->orderBy('start_time', 'asc')
            ->limit(3)
            ->get();
        $tasks = Task::whereMonth('deadline', $thisMonth)    
            ->orderBy('deadline', 'asc')
            ->limit(3)
            ->get();

        // Render all the data to the calendar
        $todos =[
            "projects" => Project::all(),
            "schedules" => Schedule::all(),
            "tasks" => Task::all(),
        ];
        $calendar = new CalendarView($time, $todos);

        return view('pages.index', compact("projects", "schedules", "tasks", "calendar"));
    }


    public function create(){
        $projects = Project::all();
        return view('pages.create', compact("projects"));
    }
}
