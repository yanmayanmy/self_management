<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    function show(Task $task){
        // dd($task);
        $info = $task;
        return view('pages.show', compact("info"));
    }

    function edit(Task $task){
        $info = $task;

        return view('pages.edit', compact("info"));
    }

    function store(Request $req){
        // dd($task);

        $task = new Task();
        $task->fill($req->all());
        $task->save();

        return redirect()->route('todos.index');
    }

    function update(Request $req, Task $task){
        // dd($task);
        
        $task->fill($req->all());
        $task->save();
        
        return redirect()->route('todos.index');

        //debug
        // return view('layouts.layouts');
    }

    function destroy(Task $task){
        $task->delete();
        return redirect()->route('todos.index');
    }
}
