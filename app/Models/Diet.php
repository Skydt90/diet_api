<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Diet extends BaseModel
{
    use HasFactory;

    protected $dates = [];
    private $daily_loss = 0.0;

    protected $fillable = [
        'diet_name', 'start_weight', 'desired_weight',
        'number_of_days', 'height', 'user_id'
    ];

    //relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function days(): HasMany
    {
        return $this->hasMany(Day::class);
    }
}
