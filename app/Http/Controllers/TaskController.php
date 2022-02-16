<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Task;
use App\Calendar\CalendarView;
use DateTime;


class TaskController extends Controller
{
    function show(Task $task){
        // dd($book);
        $info = $task;
        return view('books.show', compact("info"));
    }

    function edit(Task $task){
        $info = $task;

        return view('books.edit', compact("info"));
    }

    function store(Request $req){
        // dd($book);

        $task = new Task();
        $task->title = $req->input('title');
        $task->detail = $req->input('detail');
        $task->deadline = $req->input('deadline');
        $task->category = $req->input('category');
        $task->priority = $req->input('priority');
        $task->time_required = $req->input('time_required');
        $task->save();

        return redirect()->route('books.index');
    }

    function update(Request $req, Task $task){
        // dd($book);
        
        $task->title = $req->input('title');
        $task->detail = $req->input('detail');
        $task->deadline = $req->input('deadline');
        $task->category = $req->input('category');
        $task->priority = $req->input('priority');
        $task->time_required = $req->input('time_required');
        $task->save();
        
        return redirect()->route('books.index');

        //debug
        // return view('layouts.layouts');
    }

    function destroy(Task $task){
        $task->delete();
        return redirect()->route('books.index');
    }
}
