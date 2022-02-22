<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{


    function show(Schedule $schedule){
        // dd($schedule);
        $info = $schedule;
        return view('pages.show', compact("info"));
    }


    function edit(Schedule $schedule){
        $info = $schedule;

        return view('pages.edit', compact("info"));
    }

    function store(Request $req){
        // dd($schedule);
        
        $schedule = new Schedule();
        $schedule->fill($req->all());
        $schedule->save();

        return redirect()->route('todos.index');
    }

    function update(Request $req, Schedule $schedule){
        // dd($schedule);
        
        $schedule->fill($req->all());
        $schedule->save();
        
        return redirect()->route('todos.index');

        //debug
        // return view('layouts.layouts');
    }

    function destroy(Schedule $schedule){
        $schedule->delete();
        return redirect()->route('todos.index');
    }
}
