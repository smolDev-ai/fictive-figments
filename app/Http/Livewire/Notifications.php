<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notifications extends Component
{
    public $listeners = ['markNotificationAsRead'];

    public function markNotificationAsRead($notificationId)
    {
        auth()->user()->unreadNotifications->where('id', $notificationId)->markAsRead();

        return redirect(auth()->user()->unreadNotifications->where('id', $notificationId)->first()->data['replyLink']);
    }

    public function render()
    {
        return view('livewire.notifications', [
            "notifications" => auth()->user()->unreadNotifications,
        ]);
    }
}
