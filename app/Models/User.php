<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasHashIds;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasHashIds, HasRoles, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'name',
        'email',
        'password',
        'document',
        'phone_country',
        'phone',
        'birth_date',
        'picture',
        'user_terms_accepted',
        'user_full_registration',
        'user_responded_form'
    ];

    protected $table = 'users';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birth_date' => 'date',
            'phone_country' => 'string',
            'phone' => 'string',
        ];
    }

    public static function boot(): void
    {
        parent::boot();
        static::created(function ($user) {
            $user->code = $user->hash();
            $user->save();
        });
    }

    public function setPasswordAttribute($password): void
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function getShortNameAttribute()
    {
        $exclude = [' de ', ' da ', ' do ', ' dos ', ' e '];
        $nameBrokenIntoParts = explode(" ", str_replace($exclude, " ", $this->name));
        if (count($nameBrokenIntoParts) > 1) {
            return $nameBrokenIntoParts[0] . " " . $nameBrokenIntoParts[count($nameBrokenIntoParts) - 1];
        }
        return $nameBrokenIntoParts[0];
    }

    public function getPicturePathAttribute()
    {
        return empty($this->picture) ? Storage::url('images/users/default.png') : Storage::url("images/users/{$this->picture}");
    }
}
