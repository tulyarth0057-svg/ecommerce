<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class whistlist extends Model
{
    use HasFactory;

    public function wishlist()
{
    return $this->belongsToMany(Product::class, 'wishlists', 'user_id', 'product_id')->withTimestamps();
}

}
