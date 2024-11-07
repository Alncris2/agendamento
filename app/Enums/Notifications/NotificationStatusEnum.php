<?php 

namespace App\Enums\Notifications;

enum NotificationStatusEnum : int
{
    case ACTIVE = 1;
    case INACTIVE = 0;
}