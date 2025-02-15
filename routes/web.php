<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Feature1Controller;
use App\Http\Controllers\Feature2Controller;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/features', function () {
//     return Inertia::render('Features');
// })->name('feature1.index');

Route::get('/features/feature1', [Feature1Controller::class, 'index'])->name('feature1.index');
Route::get('/features/feature2', [Feature2Controller::class, 'index'])->name('feature2.index');

// Route::post('/features/feature1', function () {
//     return redirect()->route('feature1.index');
// })->name('feature1.calculate');

// Route::post('/features/feature2', function () {
//     return redirect()->route('feature2.index');
// })->name('feature2.calculate');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
