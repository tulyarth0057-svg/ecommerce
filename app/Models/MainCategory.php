<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory;

    protected $table = 'main_categories'; // Table ka sahi naam
    protected $primaryKey = 'cat_id';     // Primary key
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'cat_name',
        'status',
    ];
}
