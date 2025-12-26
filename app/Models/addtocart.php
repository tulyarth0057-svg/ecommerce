<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addtocart extends Model
{

    protected $table = 'addtocart';

    protected $primaryKey = 'cart_id';

    protected $fillable = [
        'user_id',
        'p_id',
        'size_id',
        'color_id',
        'qty',
        'p_price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'p_id', 'p_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
}
