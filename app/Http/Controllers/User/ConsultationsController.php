<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ConsultationsController extends Controller
{
    public function index()
    {
        return $this->vUser('consultations/index', ['User\ConsultationsController' => true]);
    }
}
