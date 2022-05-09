@extends('layouts.layouts')

@section('content')

    <div class="container">
        <div class="container high-priority">
            @foreach($tasks['task_list'] as $task)
                @if($task['priority_level'] == 1)
                    <p class="draggable" id="{{ $task->id }}" draggable="true" scroll="true">{{ $task->title }}</p>
                @endif
            @endforeach
        </div>
        <div class="container mid-priority">
            @foreach($tasks['task_list'] as $task)
            @if($task['priority_level'] == 2)
                    <p class="draggable" id="{{ $task->id }}" draggable="true" scroll="true">{{ $task->title }}</p>
                @endif
            @endforeach
        </div>
        <div class="container low-priority">
            @foreach($tasks['task_list'] as $task)
                @if($task['priority_level'] == 3    )
                    <p class="draggable" id="{{ $task->id }}" draggable="true" scroll="true">{{ $task->title }}</p>
                @endif
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary m-2">Confirm</button>
    </div>
    
    <div id="scroll-down"></div>

    <script src="{{ asset('js/drag_and_drop.js')}}"></script>
@endsection

<!-- 
    maybe change p tag to label followed by "hidden" input tag.
    then set the value(priority value) for each elements with loop.
 -->