<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

      protected $table = 'order_statuses';

    const CREATED_AT = 'o_created_at';
    const UPDATED_AT = 'o_updated_at';

    protected $fillable = [
        'order_id',
        'status',
        'tracking_number',
        'notes',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
