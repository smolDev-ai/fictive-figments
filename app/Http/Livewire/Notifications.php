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
        } elseif (auth()->user()->unreadNotifications->where('id', $notificationId)->first()->data['type'] === 'new_pm') {
            return redirect(auth()->user()->unreadNotifications->where('id', $notificationId)->first()->data['messageLink']);
        } else {
            return redirect(auth()->user()->unreadNotifications->where('id', $notificationId)->first()->data['reportLink']);
        }
    }

    public function render()
    {
        return view('livewire.notifications', [
            "notifications" => auth()->user()->unreadNotifications,
        ]);
    }
}
