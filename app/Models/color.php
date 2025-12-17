<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'color';
    protected $primaryKey = 'color_id';
    public $timestamps = true;

    protected $fillable = [
        'color_product_id',
        'color_name',
        'color_price_adjustment',
        'color_code',


    ];


   public function sizes()
{
    return $this->hasMany(Size::class, 'size_color_id', 'color_id');
}


   public function images() {
    return $this->hasMany(Image::class, 'img_color_id', 'color_id');
}







}
