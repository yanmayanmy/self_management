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
        return view('books.create_task');
    }

    function edit(Book $book){
        return view('books.edit', compact("book"));
    }

    function storeSchedule(Request $req){
        // dd($book);
        $book = new Book();
        $book->title = $req->input('title');
        $book->project_id = $req->input('project_id');
        $book->detail = $req->input('detail');
        $book->deadline = $req->input('deadline');
        $book->category = $req->input('category');
        $book->priority = $req->input('priority');
        $book->start_time = $req->input('start_time');
        $book->end_time = $req->input('end_time');
        $book->save();

        return redirect()->route('books.show', $book);
        
        //debug
        // return view('layouts.layouts');
    }
    function storeTask(Request $req){
        // dd($book);
        $book = new Book();
        $book->title = $req->input('title');
        $book->project_id = $req->input('project_id');
        $book->detail = $req->input('detail');
        $book->deadline = $req->input('deadline');
        $book->category = $req->input('category');
        $book->priority = $req->input('priority');
        $book->time_required = $req->input('time_required');
        $book->save();

        return redirect()->route('books.show', $book);
        
        //debug
        // return view('layouts.layouts');
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

        return redirect()->route('books.show', $book);

        //debug
        // return view('layouts.layouts');
    }

    function destroy(Book $book){
        $book->delete();
        return redirect()->route('books.index');
    }
}
