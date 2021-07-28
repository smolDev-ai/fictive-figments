<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginForm extends Component
{
    public $username;
    public $password;

    public function submitForm()
    {
        if (Auth::attempt(['username' => $this->username, 'password' => $this->password], true)) {
            $loggedIn = $this->username;
            $this->resetForm();
            session()->flash("success", "Account {$loggedIn} successfully logged in!");
            return redirect()->intended('/forum');
        }
    }

    private function resetForm()
    {
        $this->username = '';
        $this->password = '';
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
