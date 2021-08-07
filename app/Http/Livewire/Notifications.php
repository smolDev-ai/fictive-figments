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

        if (auth()->user()->unreadNotifications->where('id', $notificationId)->first()->data['type'] === 'new_post') {
            return redirect(auth()->user()->unreadNotifications->where('id', $notificationId)->first()->data['replyLink']);
        } else {
            return redirect(auth()->user()->unreadNotifications->where('id', $notificationId)->first()->data['messageLink']);
        }
    }

    public function render()
    {
        return view('livewire.notifications', [
            "notifications" => auth()->user()->unreadNotifications,
        ]);
    }
}
