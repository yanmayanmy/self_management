<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    function show(Project $project){
        // dd($book);
        $info = $project;
        return view('books.show', compact("info"));
    }

    function edit(Project $project){
        $info = $project;

        return view('books.edit', compact("info"));
    }

    function store(Request $req){
        // dd($book);

        $project = new project();
        $project->fill($req->all());
        $project->save();

        return redirect()->route('books.index');
    }

    function update(Request $req, Project $project){
        // dd($book);
        
        $project->fill($req->all());
        $project->save();
        
        return redirect()->route('books.index');

        //debug
        // return view('layouts.layouts');
    }

    function destroy(Project $project){
        $project->delete();
        return redirect()->route('books.index');
    }
}
