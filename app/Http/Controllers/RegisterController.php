<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register.create');
    }

    public function store(Request $request)
    {
        $user = $request->validate([
            'username' => 'required|min:5|max:255|unique:users,username',
            'email' => 'required|max:255|unique:users,email',
            'password' => 'required|min:8|max:255',
        ]);

        $user['password'] = \bcrypt($user['password']);

        User::create($user);

        return redirect('/forum');
    }
}
