<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\User;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware( [
    'auth:sanctum',
    config( 'jetstream.auth_session' ),
    'verified'
] )->group( function () {
    // dashboard home page
    Route::get( '/', [ DashboardController::class, 'index' ] )->name( 'dashboard' );
    // database notifications
    Route::get( '/notifications', [ NotificationController::class, 'index' ] )->name( 'notifications' );
    // simple test route to generate database notification in dashboard
    Route::get( '/test', function () {
        $faker = Faker\Factory::create();
        Auth::user()->notify( new \App\Notifications\TestNotification( 'New order placed <strong>#' . $faker->randomNumber( 6 ) . '</strong> on <strong>' . $faker->company . '</strong> Order Total:  <strong>£' . $faker->randomFloat( 2, 5, 200 ) . '</strong>' ) );

        return view( 'pages.dashboard' );
    } )->name( 'test' );
} );
