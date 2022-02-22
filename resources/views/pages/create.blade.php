@extends('layouts.layouts')

@section('content')
<div class="container">
    <h1 class="p-3">Adding...</h1>

    <div class="container">
        <div class="form-check">
            <input type="radio" id="schedule" name="type" class="form-check-input" onclick="entryChange()" checked>
            <label for="schedule" class="form-check-label">Schedule</label>
        </div>
        <div class="form-check">
            <input type="radio" id="task" name="type" class="form-check-input" onclick="entryChange()">
            <label for="task" class="form-check-label">Task</label>
        </div>
        <div class="form-check mb-3">
            <input type="radio" id="project" name="type" class="form-check-input" onclick="entryChange()">
            <label for="project" class="form-check-label">Project</label>
        </div>

        <!-- Schedule -->
        <form action="/schedules" method="POST" id="switch_to_schedule" style="display:none;">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="detail">Detail</label>
                <input type="textarea" name="detail" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="category" class="form-control">
            </div>
            <div class="form-group">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id" class="form-select">
                    <option value="">--select the project---</option>
                    @foreach($projects as $project)
                    <option value="{{$project->id}}">{{$project->title}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="start_time">Start time</label>
                <input type="datetime-local" name="start_time" class="form-control">
            </div>
            <div class="form-group">
                <label for="end_time">End time</label>
                <input type="datetime-local" name="end_time" class="form-control">
            </div>
            <div class="form-group">
                <label for="priority">Priority</label>
                <input type="int" name="priority" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary m-2">Add</button>
            <a href="{{ route('todos.index') }}" class="btn btn-secondary m-2">Back</a>
        </form>

        <!-- Task -->
        <form action="/tasks" method="POST" id="switch_to_task" style="display:none;">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="detail">Detail</label>
                <input type="textarea" name="detail" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="category" class="form-control">
            </div>
            <div class="form-group">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id" class="form-select">
                    <option value="">--select the project---</option>
                    @foreach($projects as $project)
                    <option value="{{$project->id}}">{{$project->title}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="datetime-local" name="deadline" class="form-control">
            </div>
            <div class="form-group">
                <label for="time_required">Time required</label>
                <input type="int" name="time_required" class="form-control">
            </div>
            <div class="form-group">
                <label for="priority">Priority</label>
                <input type="int" name="priority" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary m-2">Add</button>
            <a href="{{ route('todos.index') }}" class="btn btn-secondary m-2">Back</a>
        </form>

        <!-- Project -->
        <form action="/projects" method="POST" id="switch_to_project" style="display:none;">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="detail">Detail</label>
                <input type="textarea" name="detail" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="category" class="form-control">
            </div>
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="datetime-local" name="deadline" class="form-control">
            </div>
            <div class="form-group">
                <label for="priority">Priority</label>
                <input type="int" name="priority" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary m-2">Add</button>
            <a href="{{ route('todos.index') }}" class="btn btn-secondary m-2">Top</a>
        </form>
    </div>

    <!-- debug -->
    <?php
        //echo('<pre>');
        //var_dump($calendar->carbon->month);
        //echo('</pre>');
    ?>
    

    <script type="text/javascript">
        function entryChange(){
            radio = document.getElementsByName('type') 

            if(radio[0].checked) {
                document.getElementById('switch_to_schedule').style.display = "";
                document.getElementById('switch_to_task').style.display = "none";
                document.getElementById('switch_to_project').style.display = "none";
            }else if(radio[1].checked) {
                document.getElementById('switch_to_schedule').style.display = "none";
                document.getElementById('switch_to_task').style.display = "";
                document.getElementById('switch_to_project').style.display = "none";
            }else if(radio[2].checked) {
                document.getElementById('switch_to_schedule').style.display = "none";
                document.getElementById('switch_to_task').style.display = "none";
                document.getElementById('switch_to_project').style.display = "";
            }
        }
       
        window.onload = entryChange;
    </script>
</div>
@endsection