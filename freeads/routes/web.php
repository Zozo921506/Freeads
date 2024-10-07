<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/', function () 
{
    return view('welcome');
});

Route::get('/index', [IndexController::class, 'showIndex']);

Route::get('/createAnnonce', [AnnonceController::class, 'createAnnonce']) -> name('createAnnonce');

Route::get('/email/verify', function () 
{
    return view('auth.verify-email');
}) -> middleware('auth') -> name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) 
{
    $request -> fulfill();
    return redirect('/home');
}) -> middleware(['auth', 'signed']) -> name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request -> user() -> sendEmailVerificationNotification();
    return back() -> with('message', 'Verification link sent!');
}) -> middleware(['auth', 'throttle:6,1']) -> name('verification.send');

Route::get('/profile', function () 
{
    
})->middleware(['auth', 'verified']);

Route::get('/dashboard', function () 
{
    return view('dashboard');
}) -> middleware(['auth', 'verified']) -> name('dashboard');

Route::middleware('auth') -> group(function () 
{
    Route::get('/profile', [ProfileController::class, 'edit']) -> name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update']) -> name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy']) -> name('profile.destroy');
});

Route::post('/Annonce', [AnnonceController::class, "store"]) -> name('store');

require __DIR__.'/auth.php';
