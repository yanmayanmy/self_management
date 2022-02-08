@extends('layouts.layouts')

@section('content')
<div class="container">
    <h1 class="p-3">To Do List</h1>
    <div class="container">
        <table class="table table-striped">
            <tr>
                <td>Title</td>
                <td>Due Date</td>
                <td>Category</td>
                <td>Required Time</td>
            </tr>
                
            @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->due_date }}</td>
                <td>{{ $book->category }}</td>
                <td>{{ $book->required_time }}</td>
            </tr>
            @endforeach
        </table>
    </div>

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