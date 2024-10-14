<?php

use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::get('/', function () {
    return view('general.home');
})->name('home');

Route::get('/bands', [BandController::class, 'index'])->name('bands.index');
Route::get('/bands/{band}/albums', [AlbumController::class, 'index'])->name('albums.index');


Route::middleware(['auth'])->group(function () {

    Route::get('/bands/{band}/albums/create', function ($bandId) {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Unauthorized access.');
        }
        return app(AlbumController::class)->create(Band::findOrFail($bandId));
    })->name('albums.create');

    Route::post('/bands/{band}/albums', function (Request $request, $bandId) {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Unauthorized access.');
        }
        return app(AlbumController::class)->store($request, Band::findOrFail($bandId));
    })->name('albums.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('bands', BandController::class)->except('index');
});


Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
