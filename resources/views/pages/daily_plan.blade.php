@extends('layouts.layouts')

@section('content')
    <div class="container">

        <h2>Schedules</h2>
        <table class="table table-striped">
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
                                <i class="fa-solid fa-trash-can fa-2x"></i>
                            </button>
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
                                <i class="fa-solid fa-trash-can fa-2x"></i>
                            </button>   
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
                                <i class="fa-solid fa-trash-can fa-2x"></i>
                            </button>
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

@endsection