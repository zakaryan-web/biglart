<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class FinanceController extends Controller
{
    public function index()
    {
        return $this->vUser('finance/index', ['User\FinanceController' => true]);
    }
}
