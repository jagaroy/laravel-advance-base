<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function edit(User $user)
    {   
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    public function update(User $user)
    { 
        $this->validate(request(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'required|min:6|confirmed'
        ]);

        $user->name = request('name');
        $user->phone = request('phone');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();

        return back()->withMessage("Updated Successfully!");
    }
}