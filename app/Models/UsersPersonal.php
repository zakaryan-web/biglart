<?php

namespace App\Models;

use App\Models\Base\UsersPersonal as BaseUsersPersonal;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UsersPersonal extends BaseUsersPersonal
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
