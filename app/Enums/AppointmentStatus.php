<?php

namespace App\Enums;

enum AppointmentStatus: int
{
    case Scheduled = 1;
    case InProgress = 2;
    case Completed = 3;
    case Cancelled = 4;
}
