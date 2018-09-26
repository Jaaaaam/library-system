<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin');
    }

    public function showAll() {
        $users = User::all();

        return $users;
    }

    public function add(Request $request, User $user)
    {
        Log::debug($request);

        $user = new User;
        //add email and password
        $user->name = $request->name;
        $user->student_number = $request->student_number;
        $user->role = 'student';

        $user->save();
        
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

}
