<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Task;
use App\Models\Project;
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
        $book->fill($req->all());
        $book->save();

        return redirect()->route('books.index');
    }

    function update(Request $req, Book $book){
        // dd($book);
        
        $book->fill($req->all());
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
