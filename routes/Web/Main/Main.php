<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Main\PagesController;
use App\Http\Controllers\Main\QuestionsController;
use App\Http\Controllers\Main\SearchController;
use App\Http\Controllers\Main\ArticlesController;
use App\Http\Controllers\Main\SpecialistsController;

Route::name('home.')->group(function () {
    Route::get('', [IndexController::class, 'index'])->name('index');
});

Route::prefix('questions')->name('questions.')->group(function () {
    Route::get('', [QuestionsController::class, 'index'])->name('index');
    Route::get('view/{question}', [QuestionsController::class, 'view'])->name('view');
    Route::middleware('isSpecialist')->post('view/{question}/answer', [QuestionsController::class, 'answer'])->name('answer');
    Route::middleware('isUser')->post('view/{question}/{answer}/comment', [QuestionsController::class, 'comment'])->name('comment');
    Route::middleware('isClient')->post('view/{question}', [QuestionsController::class, 'award'])->name('award');
});

Route::prefix('specialists')->name('specialists.')->group(function () {
    Route::get('', [SpecialistsController::class, 'index'])->name('index');
    Route::get('view/{specialist}', [SpecialistsController::class, 'view'])->name('view');
});

Route::prefix('articles')->name('articles.')->group(function () {
    Route::get('', [ArticlesController::class, 'index'])->name('index');
    Route::get('view', [ArticlesController::class, 'view'])->name('view');
});

Route::prefix('pages')->name('pages.')->group(function () {
    Route::get('{slug}', [PagesController::class, 'index'])->name('index');
});

Route::prefix('search')->name('search.')->group(function () {
    Route::get('', [SearchController::class, 'index'])->name('index');
});
