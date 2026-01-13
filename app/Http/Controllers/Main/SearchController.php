<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index()
    {
        return $this->vMain('search/index', ['SearchController' => true]);
    }
}
