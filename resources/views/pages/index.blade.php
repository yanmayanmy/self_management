@extends('layouts.layouts')

@section('content')
<div class="container">
    <h1 class="p-3">To Do List</h1>

    <div class="container">
        <a href="{{ route('todos.create') }}" class="btn btn-success btn-lg m-2">+Add</a>

        <h2>Schedules</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Start time</th>
                    <th scope="col">End time</th>
                    <th scope="col">Category</th>
                    <th scope="col">Priority</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                @foreach($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->title }}</td>
                    <td>{{ $schedule->start_time }}</td>
                    <td>{{ $schedule->end_time }}</td>
                    <td>{{ $schedule->category }}</td>
                    <td>{{ $schedule->priority }}</td>
                    <td>
                        <a href="{{ route('schedules.show', $schedule) }}" class="btn btn-info">More</a>
                        <a href="{{ route('schedules.edit', $schedule) }}" class="btn btn-warning">Edit</a>
                        <form action="/schedules/{{ $schedule->id }}" method="POST" style="display: inline;">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick='return confirm("Are you sure?");'>Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Tasks</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Category</th>
                    <th scope="col">Time required(min)</th>
                    <th scope="col">Priority</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ ($task->deadline != NULL) ? $task->deadline->format('Y/M/d H:i') : NULL }}</td>
                    <td>{{ $task->category }}</td>
                    <td>{{ $task->time_required }}</td>
                    <td>{{ $task->priority }}</td>
                    <td>
                        <a href="{{ route('tasks.show', $task) }}" class="btn btn-info">More</a>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Edit</a>
                        <form action="/tasks/{{ $task->id }}" method="POST" style="display: inline;">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick='return confirm("Are you sure?");'>Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Projects</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Category</th>
                    <th scope="col">Priority</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                @foreach($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ ($project->deadline != NULL) ? $project->deadline->format('Y/M/d H:i') : NULL }}</td>
                    <td>{{ $project->category }}</td>
                    <td>{{ $project->priority }}</td>
                    <td>
                        <a href="{{ route('projects.project_map', $project) }}" class="btn btn-info">More</a>
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">Edit</a>
                        <form action="/projects/{{ $project->id }}" method="POST" style="display: inline;">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick='return confirm("Are you sure?");'>Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <!-- debug -->
    <?php
                // echo('<pre>');
                // var_dump($task);
                // var_dump($task);
                // echo('</pre>');
    ?>

    <!-- Calendar -->
    <div class="container mb-3">
        <div class="card">
            <div class="card-header calendar-header">
                <a class="btn" href="{{ url('/?date=') . $calendar->getPreviousMonth() }}">Prev</a>
                <span>{{ $calendar->getTitle() }}</span>
                <a class="btn" href="{{ url('/?date=') . $calendar->getNextMonth() }}">Next</a>
            </div>
            <div class="card-body">
                {!! $calendar->render() !!}
            </div>
        </div>
    </div>

</div>
@endsection