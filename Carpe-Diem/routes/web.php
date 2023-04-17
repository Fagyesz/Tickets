<?php

use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// Public routes
Route::get('/', [EventController::class, 'index'])->name('home');

// Authentication routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);


});

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Show create form
    Route::get('/events/new_event', [EventController::class, 'create']);

    // Store create form data
    Route::post('/create', [EventController::class, 'store']);

    //Show edit form
    Route::get('/events/{event}/edit', [EventController::class, 'edit']);

    //Update the event by the edit form
    Route::put('events/{event}', [EventController::class, 'update']);

    //Delete Event
    Route::delete('/events/{event}', [EventController::class, 'destroy']);

    //Show contact page
    Route::get('/contact', [ContactController::class, 'showContactPage']);

});

//Show event listing page
 Route::get('/events', [EventController::class, 'showEvents']);

Route::get('/auth/{provider}', [SocialController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialController::class, 'handleProviderCallback']);

//test
Route::post('/contact/send', [ContactController::class, 'sendEmail'])->name('contact.sendEmail');
Route::get('/send-test-email', function () {
    Mail::to('99c901ee@gmail.com')->send(new TestEmail('alma'));
    return 'Test email sent!';
});


// API routes
Route::middleware(['api', 'auth:sanctum'])->group(function () {
    // Your authenticated API routes here

});

//Social media share
Route::get('events/{event}/post', [ShareButtonsController::class, 'share']);

//Single listing 
Route::get('/events/{event}', [EventController::class, 'show']);