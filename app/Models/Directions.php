<?php

namespace App\Models;

use App\Models\Base\Directions as BaseDirections;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Directions extends BaseDirections
{

    public function specialisations(): HasMany
    {
        return $this->hasMany(DirectionsSpecializations::class, 'direction_id');
    }

    public function professions(): HasMany
    {
        return $this->hasMany(DirectionsProfessions::class, 'direction_id');
    }
}
