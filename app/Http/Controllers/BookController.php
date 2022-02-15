<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Task;
use App\Calendar\CalendarView;
use DateTime;

class BookController extends Controller
{
    function index(){
        $books = Book::all();
        $tasks = Task::all();

        //render to calendar
        $allBook =[
            "schedules" => $books,
            "tasks" => $tasks
        ];

        $time = new DateTime('now');
        $calendar = new CalendarView($time, $allBook);
        return view('books.index', compact("books", "tasks", "calendar"));
    }

    function show($book){
        // dd($book);
        return view('books.show', compact("book"));
    }

    public function create(){
        return view('books.create');
    }

    function edit(Book $book){
        return view('books.edit', compact("book"));
    }

    function store(Request $req){
        // dd($book);
        if($req->input('book_type') == "schedule"){
            $book = new Book();
            $book->title = $req->input('title');
            $book->project_id = $req->input('project_id');
            $book->detail = $req->input('detail');
            $book->category = $req->input('category');
            $book->priority = $req->input('priority');
            $book->start_time = $req->input('start_time');
            $book->end_time = $req->input('end_time');
            $book->save();
        }elseif($req->input('book_type') == "task"){
            $task = new Task();
            $task->title = $req->input('title');
            $task->detail = $req->input('detail');
            $task->deadline = $req->input('deadline');
            $task->category = $req->input('category');
            $task->priority = $req->input('priority');
            $task->time_required = $req->input('time_required');
            $task->save();
        }elseif($req->input('book_type') == "project"){
            //coming soon...
        }

        return redirect()->route('books.index');

    }

    function update(Request $req, Book $book){
        // dd($book);
        
        $book->title = $req->input('title');
        $book->detail = $req->input('detail');
        $book->deadline = $req->input('deadline');
        $book->category = $req->input('category');
        $book->priority = $req->input('priority');
        $book->time_required = $req->input('time_required');
        $book->save();
        
        return redirect()->route('books.index');

        //debug
        // return view('layouts.layouts');
    }

    function destroy(Book $book){
        $book->delete();
        return redirect()->route('books.index');
    }
}
