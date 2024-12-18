<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Image extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class,'FotoId');
    }

    public function album(): belongsTo {
        return $this->belongsTo(Album::class, 'AlbumID');
    }
    public function reports()
    {
        return $this->hasMany(Report::class, 'FotoId');
    }

}
