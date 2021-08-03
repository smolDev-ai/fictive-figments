<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        $user = request()->user()->slugified_user;
        Auth::logout();
        if (substr(url()->previous(), -3) == '/me') {
            return redirect("/profile/$user");
        } else {
            return redirect(url()->previous());
        }
    }

    public function render()
    {
        return view('livewire.logout');
    }
}
