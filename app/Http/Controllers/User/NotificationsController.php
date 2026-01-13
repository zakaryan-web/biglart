<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class NotificationsController extends Controller
{
    public function index()
    {
        return $this->vUser('notifications/index', ['User\NotificationsController' => true]);
    }
}
