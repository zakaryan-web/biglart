<?php

namespace App\Observers;

use App\Models\Users;

class UsersObserver
{
    public function created(Users $users): void
    {
        $users->personal()->create([]);
        $users->social()->create([]);
    }

    public function deleting(Users $users): void
    {
        $users->personal()->delete();
        $users->social()->delete();
    }
}
