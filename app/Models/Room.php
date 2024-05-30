<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'room_pictures' => 'array',
    ];

    public function dormitory()
    {
        return $this->belongsTo(Dormitory::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }

    public function priceHistory()
    {
        return $this->hasMany(PriceHistory::class);
    }
}
