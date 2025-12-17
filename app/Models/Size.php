<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';
    protected $primaryKey = 'size_id';
    public $timestamps = true;

    protected $fillable = [
        'size_id',
        'size_color_id',
        'size_name',
        'size_price_adjustment',

    ];
       

    // Each size belongs to a product color
    public function color()
    {
        return $this->belongsTo(Color::class, 'size_color_id', 'color_id');
    }



}
