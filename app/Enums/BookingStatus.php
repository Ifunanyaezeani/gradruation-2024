<?php

namespace App\Enums;

enum BookingStatus: string
{
    case CONFIRMED = 'Confirmed';
    case PENDING = 'Pending';
    case CANCELED = 'Canceled';
}
