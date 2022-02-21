<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{


    function show(Schedule $schedule){
        // dd($schedule);
        $info = $schedule;
        return view('todos.show', compact("info"));
    }


    function edit(Schedule $schedule){
        $info = $schedule;

        return view('todos.edit', compact("info"));
    }

    function store(Request $req){
        // dd($schedule);
        
        $schedule = new Schedule();
        $schedule->fill($req->all());
        $boscheduleok->save();

        return redirect()->route('schedules.index');
    }

    function update(Request $req, Schedule $schedule){
        // dd($schedule);
        
        $schedule->fill($req->all());
        $schedule->save();
        
        return redirect()->route('schedules.index');

        //debug
        // return view('layouts.layouts');
    }

    function destroy(Schedule $schedule){
        $schedule->delete();
        return redirect()->route('schedules.index');
    }
}
