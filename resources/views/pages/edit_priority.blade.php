@extends('layouts.layouts')

@section('content')


    <div class="container high-priority">
        @foreach($tasks['task_list'] as $task)
            <p class="draggable" id="{{ $task->id }}" draggable="true" scroll="true">{{ $task->title }}</p>
        @endforeach
    </div>
    <div class="container mid-priority">
        @foreach($tasks['task_list'] as $task)
            <p class="draggable" id="{{ $task->id }}" draggable="true">{{ $task->title }}</p>
        @endforeach
    </div>
    <div class="container low-priority">
        @foreach($tasks['task_list'] as $task)
            <p class="draggable" id="{{ $task->id }}" draggable="true">{{ $task->title }}</p>
        @endforeach
    </div>

    <div id="scroll-down"></div>

    <script src="{{ asset('js/drag_and_drop.js')}}"></script>
@endsection