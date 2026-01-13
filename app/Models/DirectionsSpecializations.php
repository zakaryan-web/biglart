<?php

namespace App\Models;

use App\Models\Base\DirectionsSpecializations as BaseDirectionsSpecializations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DirectionsSpecializations extends BaseDirectionsSpecializations
{

    public function direction(): BelongsTo
    {
        return $this->belongsTo(Directions::class, 'direction_id');
    }
}
