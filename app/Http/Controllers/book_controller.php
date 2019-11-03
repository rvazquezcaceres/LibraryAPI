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
}
