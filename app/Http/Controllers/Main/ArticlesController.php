<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index()
    {
        return $this->vMain('articles/index', ['ArticlesController' => true]);
    }

    public function view()
    {
        return $this->vMain('articles/view', ['ArticlesController' => true]);
    }
}
