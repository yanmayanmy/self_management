@extends('layouts.layouts')

@section('content')
<div class="container">
    <h1 class="p-3">To Do List</h1>

    <!-- List -->
    <div class="container">
        <table class="table table-striped">
            <tr>
                <td>Title</td>
                <td>{{ $book->title }}</td>
            </tr>
            <tr>
                <td>Detail</td>
                <td>{{ $book->detail }}</td>
            </tr>
            <tr>
                <td>Deadline</td>
                <td>{{ ($book->deadline != NULL) ? $book->deadline->format('Y/M/d H:i') : NULL }}</td>
            </tr>
            <tr>
                <td>Category</td>
                <td>{{ $book->category }}</td>
            </tr>
            <tr>
                <td>Time required</td>
                <td>{{ $book->time_required }}</td>
            </tr>
        </table>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Top</a>
        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit</a>
        <form action="/books/{{ $book->id }}" method="POST" style="display: inline;">
            @method("DELETE")
            @csrf
            <button type="submit" class="btn btn-danger" onclick='return confirm("Are you sure?");'>Delete</button>
        </form>
    </div>

    <!-- debug -->
    <?php
        // echo('<pre>');
        // var_dump($book->deadline);
        // echo('</pre>');
    ?>
    
</div>
@endsection