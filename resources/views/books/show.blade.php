@extends('layouts.layouts')

@section('content')
    <div class="container">
        <h1 class="p-3">More deatails</h1>

        <!-- List -->
        <div class="container">

            <div class="form-check">
                <input type="radio" id="schedule" name="type" class="form-check-input" {{ ($info instanceof App\Models\Book) ? "checked" : "disabled" }} onclick="entryChange()">
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

            <!-- Book -->
            <div id="switch_to_schedule" style="display:none;">
                <table class="table table-striped">
                    <tr>
                        <td>Title</td>
                        <td>{{ $info->title }}</td>
                    </tr>
                    <tr>
                        <td>Detail</td>
                        <td>{{ $info->detail }}</td>
                    </tr>
                    <tr>
                        <td>Start time</td>
                        <td>{{ ($info->start_time != NULL) ? $info->start_time->format('Y/M/d H:i') : NULL }}</td>
                    </tr>
                    <tr>
                        <td>End time</td>
                        <td>{{ ($info->end_time != NULL) ? $info->end_time->format('Y/M/d H:i') : NULL }}</td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>{{ $info->category }}</td>
                    </tr>
                    <tr>
                        <td>Priority</td>
                        <td>{{ $info->priority }}</td>
                    </tr>
                </table>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Top</a>
                <a href="{{ route('books.edit', $info) }}" class="btn btn-warning">Edit</a>
                <form action="/books/{{ $info->id }}" method="POST" style="display: inline;">
                    @method("DELETE")
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick='return confirm("Are you sure?");'>Delete</button>
                </form>
            </div>

            <!-- Task -->
            <div id="switch_to_task" style="display:none;">
                <table class="table table-striped">
                    <tr>
                        <td>Title</td>
                        <td>{{ $info->title }}</td>
                    </tr>
                    <tr>
                        <td>Detail</td>
                        <td>{{ $info->detail }}</td>
                    </tr>
                    <tr>
                        <td>Deadline</td>
                        <td>{{ ($info->deadline != NULL) ? $info->deadline->format('Y/M/d H:i') : NULL }}</td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>{{ $info->category }}</td>
                    </tr>
                    <tr>
                        <td>Time required</td>
                        <td>{{ ($info->time_required != NULL) ? $info->time_required : NULL }}</td>
                    </tr>
                    <tr>
                        <td>Priority</td>
                        <td>{{ $info->priority }}</td>
                    </tr>
                </table>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Top</a>
                <a href="{{ route('tasks.edit', $info) }}" class="btn btn-warning">Edit</a>
                <form action="/tasks/{{ $info->id }}" method="POST" style="display: inline;">
                    @method("DELETE")
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick='return confirm("Are you sure?");'>Delete</button>
                </form>
            </div>
            
            <!-- Project -->
            <div id="switch_to_project" style="display:none;">
                <table class="table table-striped">
                    <tr>
                        <td>Title</td>
                        <td>{{ $info->title }}</td>
                    </tr>
                    <tr>
                        <td>Detail</td>
                        <td>{{ $info->detail }}</td>
                    </tr>
                    <tr>
                        <td>Deadline</td>
                        <td>{{ ($info->deadline != NULL) ? $info->deadline->format('Y/M/d H:i') : NULL }}</td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>{{ $info->category }}</td>
                    </tr>
                    <tr>
                        <td>Priority</td>
                        <td>{{ $info->priority }}</td>
                    </tr>
                </table>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Top</a>
                <a href="{{ route('projects.edit', $info) }}" class="btn btn-warning">Edit</a>
                <form action="/projects/{{ $info->id }}" method="POST" style="display: inline;">
                    @method("DELETE")
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick='return confirm("Are you sure?");'>Delete</button>
                </form>
            </div>
        </div>

        <!-- debug -->
        <?php
            // echo('<pre>');
            // var_dump($book->deadline);
            // echo('</pre>');
        ?>
        
    </div>

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

@endsection