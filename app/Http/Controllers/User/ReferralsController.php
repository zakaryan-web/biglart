<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ReferralsController extends Controller
{
    public function index()
    {
        return $this->vUser('referrals/index', ['User\ReferralsController' => true]);
    }
}
