<?php

use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\PageController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Profile\ProfileReservationsController;
use App\Http\Controllers\ReservationController;

use App\Http\Middleware\CheckoutSession;
use App\Livewire\Amenity\AmenityCreate;
use App\Livewire\Amenity\AmenityList;
use App\Livewire\bed\BedCreate;
use App\Livewire\Bed\BedList;
use App\Livewire\Category\CategoryCreate;
use App\Livewire\Category\CategoryList;
use App\Livewire\Home\Dashboard;
use App\Livewire\Image\ImageCreate;
use App\Livewire\Image\ImageList;

use App\Livewire\Offer\OfferList;
use App\Livewire\Post\PostCreate;
use App\Livewire\Post\PostList;
use App\Livewire\Reservation\ReservationList;
use App\Livewire\Reservation\ReservationShow;
use App\Livewire\Room\RoomCreate;
use App\Livewire\Room\RoomList;
use App\Livewire\Settings\Settings;
use App\Livewire\Tag\TagCreate;
use App\Livewire\Tag\TagList;
use App\Livewire\User\UserCreate;
use App\Livewire\User\UserList;
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
Route::controller(PageController::class)->group(function () {

    Route::get('/',  'home')->name('home');
    Route::get('/about',  'about')->name('about');
    Route::get('/rooms',  'rooms')->name('rooms');
    Route::get('/room/{slug}',  'room')->name('room');
    Route::get('/gallery',  'gallery')->name('gallery');
    Route::get('/blog',  'blog')->name('blog');
    Route::get('/post/{slug}',  'post')->name('post');
    Route::get('/contact',  'contact')->name('contact');
    Route::get('/legal-policies',  'legalPolicies')->name('legal-policies');
});

Route::controller(ReservationController::class)->group(function () {

    Route::get('/search-room', 'searchRoom')->name('search-room');
    Route::get('/search-reservation', 'searchReservation')->name('search-reservation');
    Route::get('/details-reservation', 'detailsReservation')->name('details-reservation');
});
// Route::get('/checkout-reservation', [ReservationController::class, 'checkout'])->name('checkout-reservation');

Route::middleware('auth')->group(function () {

    Route::controller(ReservationController::class)->group(function () {

        Route::post('/create-reservation', 'createReservation')->name('create-reservation');
    });

    Route::controller(CheckoutController::class)->group(function () {

        Route::get('/checkout', 'checkout')->name('checkout')->middleware(CheckoutSession::class);

        Route::post('/checkout-session', 'checkoutSession')->name('checkoutSession');
    });

    Route::prefix('profile')->name('profile.')->group(function () {

        Route::controller(ProfileController::class)->group(function () {

            Route::get('/', 'index')->name('index');

            Route::get('/account-details', 'accountDetails')->name('account-details');
            Route::patch('/account-details', 'update')->name('account-details.update');
            Route::get('/change-password', 'changePassword')->name('password');
            Route::put('/change-password', 'passwordUpdate')->name('password-update');
        });

        Route::controller(ProfileReservationsController::class)->group(function () {

            Route::get('/my-reservations', 'reservations')->name('reservations');
            Route::get('/reservation/{code}', 'reservationDetails')->name('reservation');
            Route::get('/reservaton-pdf/{code}', 'invoicePdf')->name('invoice');
        });
    });
});

Route::prefix('dashboard')->middleware('auth')->name('dashboard.')->middleware(['role:admin'])->group(function () {

    Route::get('/', Dashboard::class)->name('home');
    Route::get('/dd', Dashboard::class)->name('home2');
    Route::get('/rooms', RoomList::class)->name('rooms.index');
    Route::get('/rooms/create', RoomCreate::class)->name('rooms.create');
    Route::get('/rooms/{id}/edit', RoomCreate::class)->name('rooms.edit');

    Route::get('/users', UserList::class)->name('users.index');
    Route::get('/users/create', UserCreate::class)->name('users.create');
    Route::get('/users/{id}/edit', UserCreate::class)->name('users.edit');

    Route::get('/{modelName}/{modelId}/images', ImageList::class)->name('images.index');
    Route::get('/{modelName}/{modelId}/images.create', ImageCreate::class)->name('images.create');
    Route::get('/{modelName}/{modelId}/images/{imageId}/edit', ImageCreate::class)->name('images.edit');

    Route::get('/offers', OfferList::class)->name('offers.index');
    Route::get('/offer/{edit}/edit', RoomCreate::class)->name('offers.edit');

    Route::get('/reservations', ReservationList::class)->name('reservations.index');
    Route::get('/reservations/{reservation}/show', ReservationShow::class)->name('reservations.show');

    Route::get('/amenities', AmenityList::class)->name('amenities.index');
    Route::get('/amenities/create', AmenityCreate::class)->name('amenities.create');
    Route::get('/amenities/{id}/edit', AmenityCreate::class)->name('amenities.edit');

    Route::get('/beds', BedList::class)->name('beds.index');
    Route::get('/beds/create', BedCreate::class)->name('beds.create');
    Route::get('/beds/{id}/edit', BedCreate::class)->name('beds.edit');

    Route::get('/posts', PostList::class)->name('posts.index');
    Route::get('/posts/create', PostCreate::class)->name('posts.create');
    Route::get('/posts/{id}/edit', PostCreate::class)->name('posts.edit');

    Route::get('/categories', CategoryList::class)->name('categories.index');
    Route::get('/categories/create', CategoryCreate::class)->name('categories.create');
    Route::get('/categories/{id}/edit', CategoryCreate::class)->name('categories.edit');

    Route::get('/tags', TagList::class)->name('tags.index');
    Route::get('/tags/create', TagCreate::class)->name('tags.create');
    Route::get('/tags/{id}/edit', TagCreate::class)->name('tags.edit');

    Route::get('/settings', Settings::class)->name('settings.index');
});


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
