@extends('layouts.layouts')

@section('content')
    <div class="container">
        <h1 class="p-3">Editing...</h1>

        <div class="container" id="edit">
            <div class="form-check">
                <input type="radio" id="schedule" name="type" class="form-check-input" {{ ($info instanceof App\Models\Schedule) ? "checked" : "disabled" }} onclick="entryChange()">
                <label for="schedule" class="form-check-label">Schedule</label>
            </div>
            <div class="form-check">
                <input type="radio" id="task" name="type" class="form-check-input" {{ ($info instanceof App\Models\Task) ? "checked" : "disabled" }} onclick="entryChange()">
                <label for="task" class="form-check-label">Task</label>
            </div>
            <div class="form-check mb-3">
                <input type="radio" id="project" name="type" class="form-check-input" {{ ($info instanceof App\Models\Project) ? "checked" : "disabled" }} onclick="entryChange()">
                <label for="project" class="form-check-label">Project</label>
            </div>

            <!-- Schedule -->
            <form action="/schedules/{{ $info->id }}" method="POST" id="switch_to_schedule" style="display:none;">
                @csrf
                @method("PATCH")

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $info->title }}">
                </div>
                <div class="form-group">
                    <label for="detail">Detail</label>
                    <input type="textarea" name="detail" class="form-control"value=" {{ $info->detail }}">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" name="category" class="form-control" value="{{ $info->category }}">
                </div>
                <div class="form-group">
                    <label for="start_time">Start time</label>
                    <input type="datetime-local" name="start_time" class="form-control" value="<?php if($info->start_time != NULL){ echo str_replace(" ", "T", $info->start_time);} ?>">
                </div>
                <div class="form-group">
                    <label for="end_time">End time</label>
                    <input type="datetime-local" name="end_time" class="form-control" value="<?php if($info->end_time != NULL){ echo str_replace(" ", "T", $info->end_time);} ?>">
                </div>
                <div class="form-group">
                    <label for="priority">Priority</label>
                    <input type="int" name="priority" class="form-control"value="{{ $info->priority }}">
                </div>
                
                <button type="submit" class="btn btn-primary m-2">Apply</button>
                <a href="{{ route('todos.index') }}" class="btn btn-secondary m-2">Back</a>
            </form>

            <!-- Task -->
            <form action="/tasks/{{ $info->id }}" method="POST" id="switch_to_task" style="display:none;">
                @csrf
                @method("PATCH")

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $info->title }}">
                </div>
                <div class="form-group">
                    <label for="detail">Detail</label>
                    <input type="textarea" name="detail" class="form-control" value="{{ $info->detail }}">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" name="category" class="form-control" value="{{ $info->category }}">
                </div>
                <div class="form-group">
                    <label for="deadline">Deadline</label>
                    <input type="datetime-local" name="deadline" class="form-control" value="<?php if($info->deadline != NULL){ echo str_replace(" ", "T", $info->deadline);} ?>">
                </div>
                <div class="form-group">
                    <label for="time_required">Time required</label>
                    <input type="int" name="time_required" class="form-control" value="<?php if($info->time_required != NULL){ echo str_replace(" ", "T", $info->time_required);} ?>">
                </div>
                <div class="form-group">
                    <label for="priority">Priority</label>
                    <input type="int" name="priority" class="form-control" value="{{ $info->priority }}">
                </div>

                <button type="submit" class="btn btn-primary m-2">Apply</button>
                <a href="{{ route('todos.index') }}" class="btn btn-secondary m-2">Back</a>
            </form>

            <!-- Project -->
            <form action="/projects/{{ $info->id }}" method="POST" id="switch_to_project" style="display:none;">
                @csrf
                @method("PATCH")

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $info->title }}">
                </div>
                <div class="form-group">
                    <label for="detail">Detail</label>
                    <input type="textarea" name="detail" class="form-control" value="{{ $info->detail }}">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" name="category" class="form-control" value="{{ $info->category }}">
                </div>
                <div class="form-group">
                    <label for="deadline">Deadline</label>
                    <input type="datetime-local" name="deadline" class="form-control" value="<?php if($info->deadline != NULL){ echo str_replace(" ", "T", $info->deadline);} ?>">
                </div>
                <div class="form-group">
                    <label for="priority">Priority</label>
                    <input type="int" name="priority" class="form-control" value="{{ $info->priority }}">
                </div>

                <button type="submit" class="btn btn-primary m-2">Apply</button>
                <a href="{{ route('todos.index') }}" class="btn btn-secondary m-2">Top</a>
            </form>


        </div>

        <!-- debug -->
        <?php
                    // echo('<pre>');
                    // var_dump($task);
                    // echo('</pre>');
        ?>
    </div>
    <script src="{{ asset('js/switch_form.js')}}"></script>
@endsection