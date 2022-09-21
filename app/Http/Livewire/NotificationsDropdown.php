<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationsDropdown extends Component {

    public $unreadNotifications;

    public function mount() {
        $this->getUnreadNotifications();
    }

    private function getUnreadNotifications() {
        $this->unreadNotifications = Auth::user()->unreadNotifications;
    }

    public function render() {
        return view( 'livewire.notifications.notifications-dropdown', [
            'unreadNotifications' => $this->unreadNotifications
        ] );
    }

    public function markAsRead( $notificationId ) {
        $notification = $this->unreadNotifications->find( $notificationId );
        if ( $notification ) {
            $notification->markAsRead();
            $this->mount();
        }
    }

    public function clearUnreadNotifications() {
        $this->unreadNotifications->markAsRead();
        $this->mount();
    }

}
