<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CleaningRecord extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'cleaned_by', 'cleaned_at'];

    protected $casts = ['cleaned_at' => 'datetime'];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
