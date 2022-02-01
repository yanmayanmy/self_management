<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    function index(Request $req){
        $books = Book::all();
        return view('books.index', compact("books"));
    }
}
