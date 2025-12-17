<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;
use App\Models\maincategory;


class Product extends Model
{
    protected $primaryKey = 'p_id';
      public $timestamps = true;

    use HasFactory;
      protected $fillable = ['p_name',
        'p_category_id',
         'main_category_id',
        'p_short_description',
        'p_long_description',
        'p_price',
        'p_old_price',
        'p_visibility_status',
        'p_stock',
        'p_type',
        ];





     public function colors()
    {
        return $this->hasMany(Color::class, 'color_product_id', 'p_id');

    }

    public function category() {
        return $this->belongsTo(Category::class, 'p_category_id','c_id');
    }


        public function sizes()
    {
        return $this->hasMany(Size::class, 'size_product_id', 'p_id');
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'img_color_id', 'p_id');
    }


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            foreach ($product->colors as $color) {
                $color->images()->delete();
                $color->sizes()->delete();
            }
            $product->colors()->delete();
        });
    }

        public function mainCategory()
        {
            return $this->belongsTo(MainCategory::class, 'main_category_id', 'cat_id');
        }

        public function usersWhoWishlisted()
        {
            return $this->belongsToMany(User::class, 'wishlists', 'product_id', 'user_id')->withTimestamps();
        }


}




