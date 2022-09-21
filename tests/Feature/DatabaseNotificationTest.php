<?php

namespace Tests\Feature;

use App\Models\User;
use App\Notifications\TestNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class DatabaseNotificationTest extends TestCase {

    public function test_notification_screen_cannot_be_rendered_by_guest() {

        $response = $this->get( '/notifications' );

        $response->assertRedirect( '/login' );

    }

    public function test_notification_screen_can_be_rendered_by_authenticated_user() {

        $this->actingAs( User::factory()->create() );

        $response = $this->get( '/notifications' );

        $response->assertStatus( 200 );

    }


    public function test_new_notification_can_be_seen_by_authenticated_user() {

        $user = User::factory()->create();

        $user->notify( new \App\Notifications\TestNotification( 'my test notification' ) );

        $this->actingAs( $user );

        $response = $this->get( '/notifications' );

        $response->assertSee( 'my test notification' );

    }

}
