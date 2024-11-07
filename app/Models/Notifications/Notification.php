<?php

namespace App\Models\Notifications;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'notifications_center';
    protected $guarded = [];

    public function scopeScheduled($query)
    {
        return $query->where('scheduled', true);
    }

    public function scopeManual($query)
    {
        return $query->where('scheduled', false);
    }
}
