<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DashboardRoomController;
use App\Http\Controllers\Dashboard\RoomController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Middleware\CheckoutSession;
use App\Livewire\Dashboard;
use App\Livewire\Offer\OfferList;
use App\Livewire\Reservation\ReservationList;
use App\Livewire\Reservation\ReservationShow;
use App\Livewire\Room\RoomCreate;
use App\Livewire\Room\RoomList;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/rooms', [PageController::class, 'rooms'])->name('rooms');
Route::get('/room/{slug}', [PageController::class, 'room'])->name('room');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/post/{slug}', [PageController::class, 'post'])->name('post');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/legal-policies', [PageController::class, 'legalPolicies'])->name('legal-policies');
// Route::get('/search-reservation', [ReservationController::class, 'searchReservation'])->name('search-reservation');

Route::controller(ReservationController::class)->group(function () {

    Route::get('/search-room', 'searchRoom')->name('search-room');

    Route::get('/search-reservation', 'searchReservation')->name('search-reservation');

    Route::get('/details-reservation', 'detailsReservation')->name('details-reservation');

    Route::post('/create-reservation', 'createReservation')->name('create-reservation');
});

Route::controller(CheckoutController::class)->group(function () {

    Route::get('/checkout', 'checkout')->name('checkout')->middleware(CheckoutSession::class);

    Route::post('/checkout-session', 'checkoutSession')->name('checkoutSession');
});

// Route::get('/checkout-reservation', [ReservationController::class, 'checkout'])->name('checkout-reservation');
Route::prefix('dashboard')->middleware('auth')->name('dashboard.')
    // ->middleware(['role:admin'])
    ->group(function () {

        Route::get('/', Dashboard::class)->name('home');
        Route::get('/dd', Dashboard::class)->name('home2');
        Route::get('/rooms', RoomList::class)->name('rooms.index');
        Route::get('/rooms/create', RoomCreate::class)->name('rooms.create');
        Route::get('/rooms/{id}/edit', RoomCreate::class)->name('rooms.edit');

        Route::get('/offers', OfferList::class)->name('offers.index');
        Route::get('/offer/{edit}/edit', RoomCreate::class)->name('offers.edit');

        Route::get('/reservations', ReservationList::class)->name('reservations.index');
        Route::get('/reservations/{reservation}/show', ReservationShow::class)->name('reservations.show');
    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
