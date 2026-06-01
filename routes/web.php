<?php

use App\Http\Controllers\ExhibitionController;
use App\Http\Controllers\MuseumController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('exhibitions.index');
    }

    return view('welcome');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/exhibitions', [ExhibitionController::class, 'index'])->name('exhibitions.index');
    Route::resource('museums', MuseumController::class)->except(['show']);
    Route::resource('exhibitions', ExhibitionController::class)->except(['index', 'show']);

    Route::get('/dashboard', function () {
        return redirect()->route('exhibitions.index');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
