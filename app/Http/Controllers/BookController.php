<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return $books;
    }

    public function add(Request $request, Book $book)
    {
        Log::debug($request);

        $book = new Book;

        $book->name = $request->name;
        $book->description = $request->description;
        $book->no_of_pages = $request->no_of_pages;

        $book->save();
        
        return $book;
    }

    public function edit(Request $request, Book $book)
    {
        Log::debug($request);

        $book = Book::find($request->id);

        $book->name = $request->name;
        $book->description = $request->description;
        $book->no_of_pages = $request->no_of_pages;

        $book->save();
        
        return $book;
    }
}
