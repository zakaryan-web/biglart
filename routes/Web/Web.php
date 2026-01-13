<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Inertia\Inertia;

Route::middleware('isBan')->group(function () {

    Route::name('main.')->group(function () {
        require __DIR__ . '/Main/Main.php';
    });

    require __DIR__ . '/Auth/Auth.php';

    Route::middleware('isAdmin')->prefix('admin')->name('admin.')->group(function () {
        require __DIR__ . '/Admin/Admin.php';
    });

    Route::middleware('isUser')->prefix('user')->name('user.')->group(function () {
        require __DIR__ . '/User/User.php';
    });

    Route::get('/errors/{status}', function (Request $request, $status = false) {
        return Inertia::render('Error', ['status' => $status])->toResponse($request)->setStatusCode($status);
    });
});


