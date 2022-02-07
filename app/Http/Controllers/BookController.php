<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Calendar\CalendarView;
use DateTime;

class BookController extends Controller
{
    function index(Request $req){
        $books = Book::all();
        $time = new DateTime('now');
        $calendar = new CalendarView($time);
        return view('books.index', compact("books", "calendar"));
    }
}
