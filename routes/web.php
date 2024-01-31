<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Foundation\Application;
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
Route::get('/search-reservation', [ReservationController::class, 'searchReservation'])->name('search-reservation');

Route::controller(CheckoutController::class)->group(function () {

    Route::get('/checkout', 'checkout')->name('checkout');
    Route::post('/checkout-session', 'checkoutSession')->name('checkoutSession');
    Route::post('/payment', 'payment')->name('payment');
});
// Route::get('/checkout-reservation', [ReservationController::class, 'checkout'])->name('checkout-reservation');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
