<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function beds()
    {
        return $this->belongsToMany(Bed::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
