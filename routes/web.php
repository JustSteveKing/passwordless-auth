<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(static function (): void {
    Route::view('/', 'welcome');

    Route::view('login', 'app.auth.login')->name('login');
    Route::get(
        'login/{email}',
        LoginController::class,
    )->middleware('signed')->name('login:store');

    Route::view('register', 'app.auth.register')->name('register');
});

Route::middleware(['auth'])->group(static function (): void {
    Route::view('dashboard', 'app.dashboard.show')->name('dashboard:show');
});
