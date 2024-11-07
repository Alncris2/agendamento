<?php

namespace App\Models\Notifications;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class NoticesViewed extends Model
{
    use HasFactory;
    protected $table = 'notices_viewed';

    protected $fillable = [
        'notice_id',
        'user_id'
    ];

    public function notice()
    {
        return $this->belongsTo(Notices::class, 'notice_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
