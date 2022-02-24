<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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

        $projects = Project::whereMonth('deadline', $thisMonth)    
            ->orderBy('deadline', 'asc')
            ->limit(5)
            ->get();

        $schedules = Schedule::whereMonth('start_time', $thisMonth)    
            ->orderBy('start_time', 'asc')
            ->limit(5)
            ->get();

        $tasks = Task::whereMonth('deadline', $thisMonth)    
            ->orderBy('deadline', 'asc')
            ->limit(5)
            ->get();

        // Render the data to the calendar
        $todos =[
            "projects" => $projects,
            "schedules" => $schedules,
            "tasks" => $tasks,
        ];

        $calendar = new CalendarView($time, $todos);
        return view('pages.index', compact("projects", "schedules", "tasks", "calendar"));
    }


    public function create(){
        $projects = Project::all();
        return view('pages.create', compact("projects"));
    }
}
