<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DormitoryAmenity extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dormitories()
    {
        return $this->belongsToMany(Dormitory::class, 'dormitory_amenity');
    }
}
