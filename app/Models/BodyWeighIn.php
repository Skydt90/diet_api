<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BodyWeighIn extends BaseModel
{
    use HasFactory;

    //relationships
    public function days(): BelongsTo
    {
        return $this->belongsTo(Day::class);
    }
}
