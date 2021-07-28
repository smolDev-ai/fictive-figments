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
        $user = [
            'email' => $request['email'],
            'username' => $request['username'],
            'password' => $request['password']
        ];

        $user['password'] = \bcrypt($user['password']);

        User::create($user);

        return redirect('/forum');
    }
}
