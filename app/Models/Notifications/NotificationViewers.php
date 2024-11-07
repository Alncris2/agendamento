<?php

namespace App\Models\Notifications;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationViewers extends Model
{
    use HasFactory;
    protected $table = 'notification_viewers';
    protected $guarded = [];
}
