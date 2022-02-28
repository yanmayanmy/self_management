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
    function index(Request $req){

        // Get date info from query
        $date = $req->input("date");
        if($date && preg_match("/^[0-9]{4}-[0-9]{2}$/", $date)){
            $date = new Datetime($date . "-01");
        }else{
            $date = new DateTime('now');
        }

        // Get limited number of Todos to show in the index page.(I'm assuming that this should be written in models.)
        $month = $date->format("m");
        $projects = Project::whereMonth('deadline', $month)    
            ->orderBy('deadline', 'asc')
            ->limit(3)
            ->get();
        $schedules = Schedule::whereMonth('start_time', $month)    
            ->orderBy('start_time', 'asc')
            ->limit(3)
            ->get();
        $tasks = Task::whereMonth('deadline', $month)    
            ->orderBy('deadline', 'asc')
            ->limit(3)
            ->get();

        // Render all the data to the calendar
        $todos =[
            "projects" => Project::all(),
            "schedules" => Schedule::all(),
            "tasks" => Task::all(),
        ];
        $calendar = new CalendarView($date, $todos);

        return view('pages.index', compact("projects", "schedules", "tasks", "calendar"));
    }


    public function create(){
        $projects = Project::all();
        return view('pages.create', compact("projects"));
    }
}
