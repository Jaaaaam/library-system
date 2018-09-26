<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;    
use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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

    public function delete(Request $request, Book $book)
    {
        Log::debug( $request);

        $book = Book::find($request->id);

        $book->delete();
        
        return $book;
    }

    public function borrow(Request $request, Book $book)
    {
        Log::debug( $request);
        $id = Auth::id();

        $book = Book::find($request->id);

        $book->borrowed_at = now();
        $book->borrowed_by = $id;
        $book->save();
        
        return $book;
    }

    public function return(Request $request, Book $book)
    {
        Log::debug( $request);

        $book = Book::find($request->id);

        $book->returned_at = now();
        $book->borrowed_at = NULL;
        $book->borrowed_by = NULL;
        $book->save();
        
        return $book;
    }
}
