<?php

namespace App\Models;

use App\Models\Base\UsersSocial as BaseUsersSocial;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UsersSocial extends BaseUsersSocial
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
