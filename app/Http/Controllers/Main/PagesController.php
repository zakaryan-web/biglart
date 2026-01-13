<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index()
    {
        return $this->vMain('pages/index', ['PagesController' => true]);
    }
}
