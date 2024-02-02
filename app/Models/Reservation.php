<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [

        'start_date' => 'datetime:Y-m-d',
        'end_date' => 'datetime:Y-m-d',
        'total' => 'float',
        'sub_total' => 'float',
        'adults' => 'integer',
        'kids' => 'integer',
        'nights' => 'integer',

        'data' => 'object',
        // 'discount_data' => 'object',
        // 'room_data' => 'object',
        // 'user_data' => 'object',
        // 'complements_data' => 'object',
        // 'refund_data' => 'object',
        'offer' => 'object',
        // 'canceled_date' => 'datetime:Y-m-d',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
