<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'tbl_order_items';
    protected $primaryKey = 'o_i_id';
    
    const CREATED_AT = 'o_i_created_at';
    const UPDATED_AT = 'o_i_updated_at';

    protected $fillable = [
        'o_i_order_id',
        'o_i_product_id',
        'o_i_product_name',
        'o_i_quantity',
        'o_i_size',
        'o_i_size_price',
        'o_i_product_price',
        'o_i_total_price',
    ];

    protected $casts = [
        'o_i_size_price' => 'decimal:2',
        'o_i_product_price' => 'decimal:2',
        'o_i_total_price' => 'decimal:2',
    ];

    // Relationship with order
    public function order()
    {
        return $this->belongsTo(Order::class, 'o_i_order_id', 'o_id');
    }

    // Relationship with product
    public function product()
    {
        return $this->belongsTo(Product::class, 'o_i_product_id', 'p_id');
    }
    
    public function size()
    {
        return $this->belongsTo(Size::class, 'o_i_size', 'size_id');
    }
}