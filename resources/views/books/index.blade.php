@extends('layouts.layouts')

@section('content')
    <h1>To Do</h1>
        <table>
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
@endsection