<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
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
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->student_number = $request->student_number;
        $user->role = 'student';

        $user->save();
        
        return $user;
    }

    public function edit(Request $request, User $user)
    {
        Log::debug($request);

        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->student_number = $request->student_number;
        $user->role = 'student';

        $user->save();
        
        return $user;
    }

    public function delete(Request $request, User $user)
    {
        Log::debug( $request);

        $user = User::find($request->id);

        $user->delete();
        
        return $user;
    }

}
