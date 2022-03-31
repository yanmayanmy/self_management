@extends('layouts.layouts')

@section('content')
    <div class="container">

        <!-- Project List -->
        <h2>Projects</h2>
        <table class="table table-striped todo-list">
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
                        <a href="{{ route('projects.project_map', $project) }}" class="info-btn">
                            <i class="fa-solid fa-circle-info fa-2x"></i>
                        </a>
                        <a href="{{ route('projects.edit', $project) }}" class="edit-btn m-3">
                            <i class="fa-solid fa-pen-clip fa-2x"></i>
                        </a>
                        <form action="/projects/{{ $project->id }}" method="POST" style="display: inline;">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="edit-btn" onclick='return confirm("Are you sure?");'>
                                <i class="fa-solid fa-trash fa-2x"></i>
                            </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


        <!-- Schedule List -->
        <h2>Schedules</h2>
        <table class="table table-striped todo-list">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Time</th>
                    <th scope="col">Category</th>
                    <th scope="col">Priority</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                @foreach($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->title }}</td>
                    <td>
                        {{ $schedule->start_time->format('Y/m/d H:i') }} ~ {{ $schedule->end_time->format('m/d H:i') }}
                    </td>
                    <td>{{ $schedule->category }}</td>
                    <td>{{ $schedule->priority }}</td>
                    <td>
                        <a href="{{ route('schedules.show', $schedule) }}" class="info-btn">
                            <i class="fa-solid fa-circle-info fa-2x"></i>
                        </a>
                        <a href="{{ route('schedules.edit', $schedule) }}" class="edit-btn m-3">
                            <i class="fa-solid fa-pen-clip fa-2x"></i>
                        </a>
                        <form action="/schedules/{{ $schedule->id }}" method="POST" style="display: inline;">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="edit-btn" onclick='return confirm("Are you sure?");'>
                            <i class="fa-solid fa-trash fa-2x"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Task List -->
        <h2>Tasks</h2>
        <table class="table table-striped todo-list">
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
                        <a href="{{ route('tasks.show', $task) }}" class="info-btn">
                            <i class="fa-solid fa-circle-info fa-2x"></i>
                        </a>
                        <a href="{{ route('tasks.edit', $task) }}" class="edit-btn m-3">
                            <i class="fa-solid fa-pen-clip fa-2x"></i>
                        </a>
                        <form action="/tasks/{{ $task->id }}" method="POST" style="display: inline;">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="edit-btn" onclick='return confirm("Are you sure?");'>
                                <i class="fa-solid fa-trash fa-2x"></i>
                            </button>   
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>       
    </div>

    <!-- Debug -->
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
@endsection