<?php

namespace App\Http\Controllers;

use App\book;
use Illuminate\Http\Request;

class book_controller extends Controller
{
    public function getBooks (book $books)
    {
        $books = book::all();
        dd($books);
    }

    public function postBooks (Request $request)
    {
        $books = new book;
        $books->title = $request->title;
        $books->description = $request->description;
        $books->save();
    }
}
