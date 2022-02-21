<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    function show(Project $project){
        // dd($project);
        $info = $project;
        return view('todos.show', compact("info"));
    }

    function edit(Project $project){
        $info = $project;

        return view('todos.edit', compact("info"));
    }

    function store(Request $req){
        // dd($);

        $project = new project();
        $project->fill($req->all());
        $project->save();

        return redirect()->route('todos.index');
    }

    function update(Request $req, Project $project){
        // dd($);
        
        $project->fill($req->all());
        $project->save();
        
        return redirect()->route('todos.index');

        //debug
        // return view('layouts.layouts');
    }

    function destroy(Project $project){
        $project->delete();
        return redirect()->route('todos.index');
    }
}
