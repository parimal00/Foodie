<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Filter;

class Order extends Model
{
    use HasFactory, Filter;
    protected $fillable = [
        "item_name",
        "amount",
        "price_per_unit",
        "discount_per_unit",
        "user_id",
        "created_at",
        "updated_at",
        "order_id"
    ];

    public const STATUS = [
        'Order Placed',
        'In The Kitchen',
        'Out For Delivery'
    ];
    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_order')
            ->withTimestamps()
            ->withPivot('quantity');
    }
}
