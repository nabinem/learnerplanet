<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;

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

}
