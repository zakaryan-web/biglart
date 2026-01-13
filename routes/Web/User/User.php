<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\ReferralsController;
use App\Http\Controllers\User\QuestionsController;
use App\Http\Controllers\User\FavoritesController;
use App\Http\Controllers\User\ConsultationsController;
use App\Http\Controllers\User\FilesController;
use App\Http\Controllers\User\FinanceController;
use App\Http\Controllers\User\ReviewsController;
use App\Http\Controllers\User\ArticlesController;
use App\Http\Controllers\User\NotificationsController;

Route::name('home.')->group(function () {
    Route::get('', [IndexController::class, 'index'])->name('index');
    Route::middleware('isClient')->post('/setAvatar', [IndexController::class, 'setAvatar'])->name('setAvatar');
    Route::middleware('isClient')->post('/setProfile', [IndexController::class, 'setProfile'])->name('setProfile');
    Route::middleware('isSpecialist')->post('/setSpecialistAvatar', [IndexController::class, 'setSpecialistAvatar'])->name('setSpecialistAvatar');
    Route::middleware('isSpecialist')->post('/setSpecialistProfile', [IndexController::class, 'setSpecialistProfile'])->name('setSpecialistProfile');
    Route::post('/setPassword', [IndexController::class, 'setPassword'])->name('setPassword');
});

Route::prefix('referrals')->name('referrals.')->group(function () {
    Route::get('', [ReferralsController::class, 'index'])->name('index');
});

Route::middleware('isClient')->prefix('questions')->name('questions.')->group(function () {
    Route::get('', [QuestionsController::class, 'index'])->name('index');
    Route::get('create', [QuestionsController::class, 'create'])->name('create');
    Route::get('edit/{question}', [QuestionsController::class, 'edit'])->name('edit');
    Route::post('edit/addFile', [QuestionsController::class, 'addFile'])->name('addFile');
    Route::post('edit/deleteFile', [QuestionsController::class, 'deleteFile'])->name('deleteFile');
    Route::post('store', [QuestionsController::class, 'store'])->name('store');
});

Route::prefix('favorites')->name('favorites.')->group(function () {
    Route::get('', [FavoritesController::class, 'index'])->name('index');
});

Route::prefix('notifications')->name('notifications.')->group(function () {
    Route::get('', [NotificationsController::class, 'index'])->name('index');
});

Route::prefix('consultations')->name('consultations.')->group(function () {
    Route::get('', [ConsultationsController::class, 'index'])->name('index');
});

Route::prefix('files')->name('files.')->group(function () {
    Route::middleware('isClient')->get('', [FilesController::class, 'index'])->name('index');
    Route::post('upload', [FilesController::class, 'upload'])->name('upload');
    Route::post('delete', [FilesController::class, 'delete'])->name('delete');
});

Route::prefix('finance')->name('finance.')->group(function () {
    Route::get('', [FinanceController::class, 'index'])->name('index');
});

Route::prefix('reviews')->name('reviews.')->group(function () {
    Route::get('', [ReviewsController::class, 'index'])->name('index');
});

Route::middleware('isSpecialist')->prefix('articles')->name('articles.')->group(function () {
    Route::get('', [ArticlesController::class, 'index'])->name('index');
});
