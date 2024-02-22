<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Room extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        // 'name' => 'string',
        // 'slug' => 'string',
        // 'entry' => 'string',
        // 'description' => 'string',
        // 'quantity' => 'integer',
        // 'price' => 'float',
        // 'active' => 'boolean',
        // 'adults' => 'integer',
        // 'kids' => 'integer',
        // 'home' => 'boolean',
        // 'about' => 'boolean',
    ];

    protected $attributes = [
        'name' => '',
        'slug' => '',
        'entry' => '',
        'description' => '',
        'quantity' => 1,
        'price' => null,
        'active' => 1,
        'adults' => 1,
        'kids' => 0,
        'img' => null,
        'thumb' => null,
        'home' => 0,
        'about' => 0,
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'model');
    }

    public function complements(): BelongsToMany
    {
        return $this->belongsToMany(Complement::class);
    }

    public function amenities(): BelongsToMany
    {
        return $this->belongsToMany(Amenity::class);
    }

    protected function bed()
    {
        // return $this->belongsTo(Bed::class);
    }

    public function beds(): BelongsToMany
    {
        return $this->belongsToMany(Bed::class)->withPivot('quantity');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
