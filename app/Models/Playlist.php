<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'order',
    ];

    //  A playlist belongs to a course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // 🎥 A playlist has many videos
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}

