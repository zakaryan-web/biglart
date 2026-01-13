<?php

namespace App\Models;

use App\Models\Base\UsersProfessions as BaseUsersProfessions;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UsersProfessions extends BaseUsersProfessions
{
    protected $with = ['specialization'];

    public function specialization(): HasOne
    {
        return $this->hasOne(DirectionsSpecializations::class, 'id', 'specialization_id');
    }
}
