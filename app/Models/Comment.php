<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'FotoId');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'UserId');
    }
}
