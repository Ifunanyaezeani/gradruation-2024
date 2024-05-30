<?php

namespace App\Enums;

enum DormStatus: string
{
    case DRAFT = 'Draft';
    case PENDING = 'Pending';
    case APPROVED = 'Approved';
}
