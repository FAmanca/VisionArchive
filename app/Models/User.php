<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'pfp',
        'google_id',
        'google_token',
        'google_refresh_token',
    ];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class, 'UserID');
    }
    public function images(): HasMany {
        return $this->hasMany(Image::class,'UserID');
    }
    public function comment(): HasMany {
        return $this->hasMany(Comment::class,'UserID');
    }
    public function reports()
    {
        return $this->hasMany(Report::class,'UserID');
    }
    public function likes()
    {
        return $this->hasMany(Like::class, 'FotoId');
    }
    public function banned()
    {
        return $this->hasOne(Ban::class, 'UserID');
    }
}
