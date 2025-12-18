<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class whistlist extends Model
{
    use HasFactory;

    public function whistlist()
{
    return $this->belongsToMany(Product::class, 'whistlist', 'user_id', 'p_id')->withTimestamps();
}

}
