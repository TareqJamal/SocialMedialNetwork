<?php

namespace App\Models;

// use Illuminate\Contracts\MyAuth\MustVerifyEmail;
use App\Enums\ConnectionsStatusEnum;
use App\Models\SocialNetwork\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'profile_picture',
        'bio',
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
    ];

    public function sentConnections(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'connections', 'user_id', 'connected_id')
            ->wherePivot('status', '=', ConnectionsStatusEnum::Accepted->value);
    }

    public function receivedConnections(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'connections', 'connected_id', 'user_id'
        )->wherePivot('status', ConnectionsStatusEnum::Accepted->value);
    }

    public function getFriendsAttribute()
    {
        return $this->sentConnections->merge($this->receivedConnections)->unique('id')->values();
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id');
    }


}
