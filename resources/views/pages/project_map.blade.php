@extends('layouts.layouts')

@section('content')

<div id="project_map" class="container relative">
    <div class="project-goal">
        <h1>{{$project->title}}</h1>
    </div>

    <span class="time_line"></span>

    <div class="project__todos">
        @foreach($milestones as $milestone)
            <div class="todo__wrapper relative">
                <h2>{{$milestone['title']}}</h2>
                <p>
                    <?php
                        switch($milestone['type']){
                            case("task"):
                                echo $milestone['deadline'];
                                break;
                            case("schedule"):
                                echo $milestone['start_time'];
                                echo " - ";
                                echo $milestone['end_time'];
                                break;
                        }
                            
                    ?>
                </p>
            </div>
        @endforeach
    </div>
</div>




<a href="{{ route('todos.index') }}" class="btn btn-secondary m-2">Top</a>







<?php
        // echo "<pre>";
        // var_dump($todos);
        // echo "</pre>";
    ?>





@endsection