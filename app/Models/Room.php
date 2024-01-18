<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Room extends Model
{
    use HasFactory;

    // protected $casts = [
    //     'name' => 'string',
    //     'slug' => 'string',
    //     'entry' => 'string',
    //     'description' => 'string',
    //     'quantity' => 'integer',
    //     'price' => 'float',
    //     'active' => 'boolean',
    //     'adults' => 'integer',
    //     'kids' => 'integer',
    // ];

    // protected $attributes = [
    //     'active' => 0,
    //     'quantity' => 0,
    //     'price' => 0,
    //     // 'beds' => 0,
    //     'adults' => 0,
    //     'kids' => 0,
    // ];

    public function images()
    {
        return $this->morphMany(Image::class, 'model');
    }

    public function complements()
    {
        return $this->belongsToMany(Complement::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    protected function bed(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->beds->firstWhere('default', 1),

        );
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
