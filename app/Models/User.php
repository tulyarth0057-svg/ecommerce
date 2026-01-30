<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Order;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    // ✅ Fillable fields (mass assignable)
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role', // admin/user
    ];

    // ✅ Hidden fields (for API/serialization)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // ✅ Casting
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // ✅ Wishlist relationship (agar future me use karni hai)
    public function wishlist()
    {
        return $this->belongsToMany(Product::class, 'wishlist', 'user_id', 'p_id')->withTimestamps();
    }

    // order relationship
   public function orders()
{
    return $this->hasMany(Order::class, 'o_user_id', 'id');
}
}

