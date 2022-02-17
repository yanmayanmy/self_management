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
        $allData =[
            "books" => $books,
            "tasks" => $tasks
        ];

        $time = new DateTime('now');
        $calendar = new CalendarView($time, $allData);
        return view('books.index', compact("books", "tasks", "calendar"));
    }

    function show(Book $book){
        // dd($book);
        $info = $book;
        return view('books.show', compact("info"));
    }

    public function create(){
        return view('books.create');
    }

    function edit(Book $book, Task $task){
        $info = $book;

        return view('books.edit', compact("info"));
    }

    function store(Request $req){
        // dd($book);
        
        $book = new Book();
        $book->title = $req->input('title');
        $book->project_id = $req->input('project_id');
        $book->detail = $req->input('detail');
        $book->category = $req->input('category');
        $book->priority = $req->input('priority');
        $book->start_time = $req->input('start_time');
        $book->end_time = $req->input('end_time');
        $book->save();

        return redirect()->route('books.index');
    }

    function update(Request $req, Book $book){
        // dd($book);
        
        $book->title = $req->input('title');
        $book->project_id = $req->input('project_id');
        $book->detail = $req->input('detail');
        $book->category = $req->input('category');
        $book->priority = $req->input('priority');
        $book->start_time = $req->input('start_time');
        $book->end_time = $req->input('end_time');
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
