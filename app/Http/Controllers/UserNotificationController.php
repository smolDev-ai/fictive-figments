<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function show()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
