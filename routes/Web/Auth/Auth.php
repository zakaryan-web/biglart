<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\PasswordRecoveryController;


Route::prefix('auth')->name('auth.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::name('login.')->group(function () {
            Route::get('', [LoginController::class, 'index'])->name('index');
            Route::post('', [LoginController::class, 'store'])->name('store');
        });

        Route::prefix('registration')->name('registration.')->group(function () {
            Route::get('', [RegistrationController::class, 'index'])->name('index');
            Route::post('', [RegistrationController::class, 'store'])->name('store');
        });

        Route::prefix('recovery')->name('recovery.')->group(function () {
            Route::get('', [PasswordRecoveryController::class, 'index'])->name('index');
            Route::post('', [PasswordRecoveryController::class, 'send'])->name('send');
            Route::post('store', [PasswordRecoveryController::class, 'store'])->name('store');
        });
    });

    Route::middleware('isUser')->group(function () {
        Route::prefix('logout')->name('logout.')->group(function () {
            Route::get('', [LogoutController::class, 'index'])->name('index');
        });
    });
});

Route::prefix('password')->name('password.')->group(function () {
    Route::get('{token}', [PasswordRecoveryController::class, 'reset'])->name('reset');
});
