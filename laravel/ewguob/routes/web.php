<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\LogoutController;

Route::get('/', function() {
    return view('index');
})->name('home');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/africa', [BlogController::class, 'africa'])->name('africa');
Route::get('/america', [BlogController::class, 'america'])->name('america');
Route::get('/japan', [BlogController::class, 'japan'])->name('japan');
Route::get('/sydney', [BlogController::class, 'sydney'])->name('sydney');
Route::get('/blog1', [BlogController::class, 'blog1'])->name('blog1');
Route::get('/blog2', [BlogController::class, 'blog2'])->name('blog2');
Route::post('/save-blog', [BlogController::class, 'save'])->name('save.blog');


Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/travel', [TravelController::class, 'index'])->name('travel');
Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants');
Route::get('/aboutme', [AboutController::class, 'index'])->name('aboutme');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
Route::get('/admin/destinations', [AdminController::class, 'destinations'])->name('admin.destinations');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/tracking', [AdminController::class, 'tracking'])->name('admin.tracking');
Route::get('/admin/employee', [AdminController::class, 'employee'])->name('admin.employee');
Route::get('/admin/feedback', [AdminController::class, 'feedback'])->name('admin.feedback');

Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.submit');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.submit');
Route::get('/user_dashboard',function(){return view('user_dashboard');})->name('user.login');


Route::get('login/{provider}', [SocialAuthController::class, 'redirectToProvider'])->name('social.login');
Route::get('login/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback'])->name('social.callback');
