<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'image_id';
    public $timestamps = true;

    protected $fillable = [
        'img_color_id',
        'img_path',
        'img_alt_text',

    ];



    //  one color has many images---->
 public function images()
{
    return $this->hasMany(Image::class, 'img_product_id', 'p_id');
}
    // Product.php



    //  one color has many sizes---->
    public function sizes()
    {
        return $this->hasMany(Size::class, 'size_color_id', 'color_id');
    }
}
