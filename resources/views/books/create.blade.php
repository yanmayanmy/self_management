@extends('layouts.layouts')

@section('content')
<div class="container">
    <h1 class="p-3">Create</h1>

    <!-- List -->
    <div class="container">
        <form action="/books" method="POST">
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
                <label for="deadline">Deadline</label>
                <input type="datetime-local" name="deadline" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="category" class="form-control">
            </div>
            <div class="form-group">
                <label for="time_required">Time required</label>
                <input type="int" name="time_required" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary m-2">ADD</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary m-2">Back</a>
        </form>

    </div>

    <!-- debug -->
    <?php
        //echo('<pre>');
        //var_dump($calendar->carbon->month);
        //echo('</pre>');
    ?>
    
</div>
@endsection