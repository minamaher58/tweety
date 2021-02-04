<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'avatar',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tweet()
    {
        return $this->hasMany(Tweet::class);
    }

    public function getAvatarAttribute($value)
    {
//        return "https://i.pravatar.cc/200?u=".$this->email;
        return asset( $value? 'storage/'.$value : "https://i.pravatar.cc/200?u=".$this->email );
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function timeline()
    {
//        return Tweet::where('user_id', $this->id)->latest()->get();
        $friends = $this->follows->pluck('id');

        return Tweet::whereIn('user_id', $friends)
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->latest()
            ->simplePaginate(5);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    //    public function getRouteKeyName()
//    {
//        return 'name';
//    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
