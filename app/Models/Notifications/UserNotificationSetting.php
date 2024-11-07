<?php

namespace App\Models\Notifications;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNotificationSetting extends Model
{
    use HasFactory;

    protected $table = 'users_notifications_settings';

    protected $fillable = [
        'user_id',
        'type',
        'active',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
