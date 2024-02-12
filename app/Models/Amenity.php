<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Amenity extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Room::class);
    }
}
