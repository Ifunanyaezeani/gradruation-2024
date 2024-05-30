<?php

namespace App\Enums;

enum Availability: string
{
    case AVAILABLE = 'Available';
    case BOOKED = 'Booked';
}
