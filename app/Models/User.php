<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
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
        'password' => 'hashed',
    ];

    /**
     * Get the user's first name.
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: function(mixed $value, array $attributes){
                $name = !empty($attributes['first_name']) ? $attributes['first_name'] : '';
                $name  .= !empty($attributes['last_name']) ? (' '.$attributes['last_name']) : '';
                
                return $name;
            }
        );
    }

       public function courses()
    {
        return $this->belongsToMany(Course::class)
            ->withTimestamps()
            ->withPivot('is_complete', 'enrolled_at');
    }

    // Videos the user has watched (pivot includes progress)
    public function videos()
    {
        return $this->belongsToMany(Video::class, 'user_video')
            ->withTimestamps()
            ->withPivot('is_watched', 'watched_at', 'watch_duration');
    }

}
