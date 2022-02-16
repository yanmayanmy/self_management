@extends('layouts.layouts')

@section('content')
<div class="container">
    <h1 class="p-3">Adding...</h1>

    <!-- List -->
    <div class="container">
        <div class="form-check">
            <input type="radio" id="schedule" name="addon" class="form-check-input" onclick="entryChange()" checked>
            <label for="schedule" class="form-check-label">Schedule</label>
        </div>
        <div class="form-check">
            <input type="radio" id="task" name="addon" class="form-check-input" onclick="entryChange()">
            <label for="task" class="form-check-label">Task</label>
        </div>
        <div class="form-check mb-3">
            <input type="radio" id="project" name="addon" class="form-check-input" onclick="entryChange()">
            <label for="project" class="form-check-label">Project</label>
        </div>

        <form action="/books" method="POST" id="schedule_form" style="display:none;">
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
            <a href="{{ route('books.index') }}" class="btn btn-secondary m-2">Back</a>
        </form>

        <form action="/tasks" method="POST" id="task_form" style="display:none;">
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
                <label for="time_required">Time required</label>
                <input type="int" name="time_required" class="form-control">
            </div>
            <div class="form-group">
                <label for="priority">Priority</label>
                <input type="int" name="priority" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary m-2">Add</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary m-2">Back</a>
        </form>

        <!-- Project form coming soon... -->

    </div>

    <!-- debug -->
    <?php
        //echo('<pre>');
        //var_dump($calendar->carbon->month);
        //echo('</pre>');
    ?>
    

    <script type="text/javascript">
        function entryChange(){
            radio = document.getElementsByName('addon') 

            if(radio[0].checked) {
                document.getElementById('schedule_form').style.display = "";
                document.getElementById('task_form').style.display = "none";
                // project form
            }else if(radio[1].checked) {
                document.getElementById('schedule_form').style.display = "none";
                document.getElementById('task_form').style.display = "";
                // project form

            }
        }
       
        window.onload = entryChange;
    </script>
</div>
@endsection