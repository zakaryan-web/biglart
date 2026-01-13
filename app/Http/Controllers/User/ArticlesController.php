<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index()
    {
        return $this->vUser('articles/index', ['User\ArticlesController' => true]);
    }
}
