<?php

namespace App\Enums;

enum RoomStatus: string
{
    case AVAILABLE = 'Available';
    case BOOKED = 'Booked';
}
