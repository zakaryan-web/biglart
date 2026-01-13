<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class FavoritesController extends Controller
{
    public function index()
    {
        return $this->vUser('favorites/index', ['User\FavoritesController' => true]);
    }
}
