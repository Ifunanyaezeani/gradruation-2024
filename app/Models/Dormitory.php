<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dormitory extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at'];
    public function owner()
    {
        return $this->belongsTo(DormOwner::class, 'dorm_owner_id');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'dormitory_amenities', 'dormitory_id', 'amenity_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
