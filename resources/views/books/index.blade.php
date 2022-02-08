@extends('layouts.layouts')

@section('content')
<div class="container">
    <h1 class="p-3">To Do List</h1>

    <!-- List -->
    <div class="container">
    <td><a href="{{ route('books.create') }}" class="btn btn-success btn-lg m-2">追加</a></td>

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
                    <a href="{{ route('books.show', $book) }}" class="btn btn-info">詳細</a>
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">編集</a>
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