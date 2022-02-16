@extends('layouts.layouts')

@section('content')
<div class="container">
    <h1 class="p-3">To Do List</h1>

    <!-- List -->
    <div class="container">
        <a href="{{ route('books.create') }}" class="btn btn-success btn-lg m-2">+Add</a>

        <h2>Schedules</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Start time</th>
                    <th scope="col">End time</th>
                    <th scope="col">Category</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->start_time }}</td>
                    <td>{{ $book->end_time }}</td>
                    <td>{{ $book->category }}</td>
                    <td>{{ $book->time_required }}</td>
                    <td>
                        <a href="{{ route('books.show', $book) }}" class="btn btn-info">More</a>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit</a>
                        <form action="/books/{{ $book->id }}" method="POST" style="display: inline;">
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

    </div>

    <!-- debug -->
    <?php
                // echo('<pre>');
                // var_dump($book);
                // var_dump($task);
                // echo('</pre>');
                // if($book instanceof App\Models\Book){echo "True";}else{echo "False";}
                // if($task instanceof App\Models\Task){echo "True";}else{echo "False";}
    ?>

    <!-- Calendar -->
    <div class="container mb-3">
        <div class="card">
            <div class="card-header">
                {{ $calendar->getTitle() }}
            </div>
            <div class="card-body">
                {!! $calendar->render() !!}
            </div>
        </div>
    </div>

</div>
@endsection