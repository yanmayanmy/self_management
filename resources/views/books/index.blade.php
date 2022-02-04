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

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ $calendar->getTitle() }}</div>
                            <div class="card-body">
                                    {!! $calendar->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection