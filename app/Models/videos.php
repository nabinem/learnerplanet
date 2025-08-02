<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'playlist_id',
        'title',
        'description',
        'is_free',
        'video_url',
        'thumbnail',
        'order',
    ];

    // A video belongs to a course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // A video may belong to a playlist (nullable)
    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }

    //Users who watched this video (many-to-many pivot)
    public function watchers()
    {
        return $this->belongsToMany(User::class, 'user_video')
                    ->withTimestamps()
                    ->withPivot('is_watched', 'watched_at', 'watch_duration');
    }
}

