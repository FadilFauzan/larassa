<?php
use App\Models\Menu;
use App\Models\Event;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DashboardMenuController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardEventController;
use App\Http\Controllers\DashboardCategoryController;

// Halaman Umum
Route::get('/', function () {
    return view('home', [
        'event' => Event::latest()->first(),
        'active' => 'home'
    ]);
})->name('home');

Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
        'active' => 'about',
    ]);
})->name('about');

Route::get('/contact', function () {
    return view('contact', [
        'title' => 'Contact us',
        'active' => 'contact',
    ]);
})->name('contact');

// menus
Route::get('/menus', [MenuController::class, 'index'])->name('menus');
Route::get('/menu/{menu:slug}', [MenuController::class, 'show']); // route model binding

// Authentication Routes
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

// Dashboard (Admin)
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'admin']);
Route::resource('/dashboard/menus', DashboardMenuController::class)->middleware(['auth', 'admin']);
Route::resource('/dashboard/users', DashboardUserController::class)->middleware(['auth', 'admin']);
Route::resource('/dashboard/events', DashboardEventController::class)->middleware(['auth', 'admin']);
Route::resource('/dashboard/categories', DashboardCategoryController::class)->middleware(['auth', 'admin']);
Route::get('/dashboard/change-password', [PasswordController::class, 'changePassword'])->middleware(['auth', 'admin']);
Route::post('/dashboard/change-password', [PasswordController::class, 'processChangePassword'])->name('password.change')->middleware(['auth', 'admin']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// Contact
Route::post('/send-to-whatsapp', [ContactController::class, 'sendToWhatsApp'])->name('send.to.whatsapp');
