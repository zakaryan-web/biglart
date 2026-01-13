<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;

Route::get('/', [IndexController::class, 'index'])->name('index');
