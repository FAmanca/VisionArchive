<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function image()
    {
        return $this->belongsTo(Image::class,'FotoId');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'UserID');
    }
}
