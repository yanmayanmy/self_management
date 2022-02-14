@extends('layouts.layouts')

@section('content')
<div class="container">
    <h1 class="p-3">To Do List</h1>

    <!-- List -->
    <div class="container">
        <a href="{{ route('books.create') }}" class="btn btn-success btn-lg m-2">+Schedule</a>
        <a href="{{ route('books.create') }}" class="btn btn-success btn-lg m-2">+Task</a>

        <h2>Schedule</h2>
        <table class="table table-striped">
            <tr>
                <td>Title</td>
                <td>Start time</td>
                <td>End time</td>
                <td>Category</td>
                <td>Time required(min)</td>
                <td></td>
            </tr>
                
            @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->start_time }}</td>
                <td>{{ $book->end_time }}</td>
                <td>{{ $book->start_time }}</td>
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
        </table>

        <h2>Task</h2>
        <table class="table table-striped">
            <tr>
                <td>Title</td>
                <td>Deadline</td>
                <td>Category</td>
                <td>Time required(min)</td>
                <td></td>
            </tr>
                
            @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ ($book->deadline != NULL) ? $book->deadline->format('Y/M/d H:i') : NULL }}</td>
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
        </table>

    </div>

    <!-- debug -->
    <?php
        // echo('<pre>');
        // var_dump($book->deadline);
        // var_dump($book->time_required);
        // echo('</pre>');
    ?>

    <!-- Calendar -->
    <div class="container">
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