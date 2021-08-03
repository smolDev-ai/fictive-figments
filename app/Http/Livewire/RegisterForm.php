<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class RegisterForm extends Component
{
    public $username;
    public $email;
    public $password;

    public function submitForm()
    {
        $user = $this->validate([
            'username' => 'required|min:5|max:255|unique:users,username',
            'email' => 'required|max:255|unique:users,email|email',
            'password' => 'required|min:8|max:255',
        ]);

        $user['password'] = \bcrypt($user['password']);

        if (preg_match('/^[^ ].* .*[^ ]$/', $user['username'])) {
            $createSlugArr = explode(' ', $user['username']);
            $slug = implode('-', $createSlugArr);
            $user['slugified_user'] = $slug;
        } else {
            $user['slugified_user'] = $user['username'];
        }

        $newUser = User::create($user);
        $newUser->slugified_user = $user['slugified_user'];
        $newUser->save();

        $this->resetForm();

        session()->flash("success", "Account {$user['username']} successfully registered!");

        return redirect('/login');
    }

    private function resetForm()
    {
        $this->username = '';
        $this->email = '';
        $this->password = '';
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
