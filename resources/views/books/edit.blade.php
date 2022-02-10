@extends('layouts.layouts')

@section('content')
<div class="container">
    <h1 class="p-3">Edit</h1>

    <!-- List -->
    <div class="container" id="edit">
        <form action="/books/{{ $book->id }}" method="POST" class="edit-form">
            @csrf
            @method("PATCH")
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $book->title }}">
            </div>
            <div class="form-group">
                <label for="detail">detail</label>
                <input type="text" name="detail" class="form-control" value="{{ $book->detail }}">
            </div>
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="datetime-local" name="deadline" class="form-control" value="{{ str_replace(" ", "T", $book->deadline) }}">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="category" class="form-control" value="{{ $book->category }}">
            </div>
            <div class="form-group">
                <label for="time_required">Time required</label>
                <input type="text" name="time_required" class="form-control" value="{{ $book->time_required }}">
            </div>
            
            <div class="button">
                <button type="submit" class="btn btn-primary">Apply</button>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
            </div>
    </div>

    <!-- debug -->
    <?php
        //echo('<pre>');
        //var_dump($calendar->carbon->month);
        //echo('</pre>');
    ?>
    
</div>
@endsection