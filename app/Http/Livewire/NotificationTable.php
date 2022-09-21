<?php

namespace App\Http\Livewire;

use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class NotificationTable extends Component {

    use WithPagination;

    private function getUnreadNotifications() {
        $this->unreadNotificationss = Auth::user()->unreadNotifications()->paginate( 2 );
    }

    public function markAsRead( $notificationId ) {
        $notification = Auth::user()->unreadNotifications()->find( $notificationId );
        if ( $notification ) {
            $notification->markAsRead();
            $this->resetPage();
        }
    }

    public function clearUnreadNotifications() {
        Auth::user()->unreadNotifications->markAsRead();
    }

    public function render() {
        return view( 'livewire.notifications.notification-table', [
            'unreadNotifications' => Auth::user()->unreadNotifications()->paginate( 10 )
        ] );
    }

}
