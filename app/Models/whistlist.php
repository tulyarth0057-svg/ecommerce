<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class whistlist extends Model
{
    use HasFactory;
           protected $table = 'wishlist';

        protected $fillable = ['user_id', 'p_id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'p_id','p_id');
    }


}
