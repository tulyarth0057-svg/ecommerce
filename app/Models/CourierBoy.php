<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CourierBoy extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'mobile', 'email', 'password', 'address',
        'id_type', 'id_proof', 'vehicle_type', 'vehicle_number',
        'vehicle_rc', 'bank_account', 'is_verified' , 'ifsc_code',
        'account_holder_name', 'profile_photo',
    ];

    protected $hidden = ['password'];
}
