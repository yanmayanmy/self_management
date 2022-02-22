@extends('layouts.layouts')

@section('content')
<div class="container">
    <h1 class="p-3">Project Map</h1>

    <div class="container">
        <h1>{{$project->title}}</h1>
        @foreach($milestones as $milestone)
            <h2>{{$milestone['title']}}</h2>
        @endforeach
    </div>
    <a href="{{ route('todos.index') }}" class="btn btn-secondary m-2">Top</a>

    <?php
        // echo "<pre>";
        // var_dump($todos);
        // echo "</pre>";
    ?>

</div>
@endsection