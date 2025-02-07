<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'content'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likeBy()
    {
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

}
