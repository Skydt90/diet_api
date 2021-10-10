<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Day extends BaseModel
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'date', 'diet_id', 'goal_weight', 'morning_weight',
        'allowed_food_intake', 'created_at', 'updated_at'
    ];

    //relationships
    public function diet(): BelongsTo
    {
        return $this->belongsTo(Diet::class);
    }

    public function foodWeighIns(): HasMany
    {
        return $this->hasMany(FoodWeighIn::class);
    }

    public function bodyWeighIns(): HasMany
    {
        return $this->hasMany(BodyWeighIn::class);
    }
}
