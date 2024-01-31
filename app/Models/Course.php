<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['user_id'];

    const VIDEOS_DIR = 'videos';

    const IMAGES_DIR = 'images';

}
