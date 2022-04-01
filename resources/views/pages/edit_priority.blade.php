@extends('layouts.layouts')

@section('content')


    <div class="container">
        @foreach($tasks['task_list'] as $task)
            <p class="draggable" id="{{ $task->id }}" draggable="true">{{ $task->title }}</p>
        @endforeach
    </div>
    <div class="container">
        <!-- <p class="draggable" id="3" draggable="true">3</p>
        <p class="draggable" id="4" draggable="true">4</p> -->
    </div>

    <script src="{{ asset('js/drag_and_drop.js')}}"></script>
@endsection