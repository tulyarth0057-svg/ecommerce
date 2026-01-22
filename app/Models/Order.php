<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'tbl_orders';
    protected $primaryKey = 'o_id';
    
    const CREATED_AT = 'o_created_at';
    const UPDATED_AT = 'o_updated_at';

    protected $fillable = [
        'o_user_id',
        'o_order_number',
        'o_email',
        'o_name',
        'o_street_address',
        'o_city',
        'o_postcode',
        'o_state',
        'o_phone',
        'o_order_notes',
        'o_subtotal',
        'o_shipping_cost',
        'o_total_amount',
        'o_payment_method',
        'o_payment_status',
        'o_order_status',
        'o_razorpay_order_id',
        'o_razorpay_payment_id',
        'o_razorpay_signature',
        'o_latitude',
        'o_longitude',
    ];

    protected $casts = [
        'o_subtotal' => 'decimal:2',
        'o_shipping_cost' => 'decimal:2',
        'o_total_amount' => 'decimal:2',
        'o_latitude' => 'decimal:7',
        'o_longitude' => 'decimal:7',
    ];

    // Relationship with order items
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'o_i_order_id', 'o_id');
    }

    // Relationship with user
    public function user()
    {
        return $this->belongsTo(User::class, 'o_user_id', 'u_id');
    }

    // track order statuses--->

     public function statuses()
    {
        return $this->hasMany(OrderStatus::class, 'order_id', 'o_id');
    }

    public function latestStatus()
    {
        return $this->hasOne(OrderStatus::class, 'order_id', 'o_id')->latestOfMany();
    }
}