<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Calendar\CalendarView;
use DateTime;

class BookController extends Controller
{
    function index(){
        $books = Book::all();
        $time = new DateTime('now');
        $calendar = new CalendarView($time, $books);
        return view('books.index', compact("books", "calendar"));
    }

    function show(Book $book){
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
        $book = new Book();
        $book->title = $req->input('title');
        $book->detail = $req->input('detail');
        $book->deadline = $req->input('deadline');
        $book->category = $req->input('category');
        $book->priority = $req->input('priority');
        $book->time_required = $req->input('time_required');
        $book->save();

        return redirect()->route('books.show', $book);
    }
}
