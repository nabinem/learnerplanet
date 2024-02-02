<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'user_id'];

    const VIDEOS_DIR = 'videos';

    const IMAGES_DIR = 'images';

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function canUserAccess($user = null)
    {
        $user ??= auth()->user();

        if ($user->role === 'admin') return true;

        if ($this->user_id == $user->id) return true;
        
        return false;
    }

}
