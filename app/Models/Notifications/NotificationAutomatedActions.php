<?php

namespace App\Models\Notifications;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationAutomatedActions extends Model
{
    use HasFactory;
    
    protected $table = 'notification_automated_actions';

    protected $fillable = [
        'action',
        'description'
    ];  

    protected $casts = [
        'description' => 'string'
    ];
}
