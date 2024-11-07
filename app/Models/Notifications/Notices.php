<?php

namespace App\Models\Notifications;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Model\Notifications\NoticesViewed;

class Notices extends Model
{
    use HasFactory;
    protected $table = 'crea';

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'status'
    ];

    protected $hidden = [
        'updated_at'
    ];
    
    //appends
    protected $appends = [
        'created_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function viewed()
    {
        return $this->hasMany(NoticesViewed::class, 'notice_id');
    }


    public function getCreatedDateAttribute()
    {
        return $this->created_at->format('d/m/Y H:i');
    }

    public function scopeLimitFromAccountCreation($query)
    {
        $accountCreation = Carbon::parse(auth()->user()->created_at);

        return $query->where('notices.created_at', '>=', $accountCreation->format('Y-m-d H:i:s'));
    }
}
