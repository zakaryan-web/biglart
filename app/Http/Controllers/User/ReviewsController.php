<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ReviewsController extends Controller
{
    public function index()
    {
        return $this->vUser('reviews/index', ['User\ReviewsController' => true]);
    }
}
