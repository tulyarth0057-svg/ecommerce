<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $primaryKey = 'c_id';
    public $timestamps = true;

    protected $fillable = [
        'c_name',
        'main_category_id',
        'c_banner_img',
        'c_image',
        'c_description',
    ];

    // Relation → Category has many Products
    public function products()
    {
        return $this->hasMany(Product::class, 'p_category_id', 'c_id');
    }

    // ✅ Relation → Category belongs to Main Category
    public function mainCategory()
    {
        return $this->belongsTo(MainCategory::class, 'main_category_id', 'cat_id');
    }
}
