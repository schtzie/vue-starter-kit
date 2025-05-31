<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/**
 * Authentication Routes
 */
require __DIR__.'/auth.php';

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';

