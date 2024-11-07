<?php

namespace App\Models\Notifications;

use App\Enums\Notifications\{
    NotificationsActionsEnum,
    NotificationStatusEnum
};

use Enums\Notifications\ActionsEnums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationAutomatedDispatch extends Model
{
    use HasFactory;

    protected $table = 'notification_automated_dispatch';

    protected $fillable = [
        'action',
        'title',
        'text',
        'status'
    ];
    
    protected $casts = [
        'status' => NotificationStatusEnum::class,
    ];

    public function automatedActions()
    {
        return $this->belongsTo(NotificationAutomatedActions::class, 'action');
    }
}
