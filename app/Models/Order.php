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
        "order_id",
        'status',
        'driver_id'
    ];

    public const STATUS = [
        'Processing',
        'Order Placed',
        'In The Kitchen',
        'Out For Delivery',
        'Rejected'
    ];
    public function scopeFilterStatus($query, $status)
    {
        if($status){
            return $query->where('status',$status);
        }
        return $query->where('status','!=','delivered');
    }
    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_order')
            ->withTimestamps()
            ->withPivot('quantity');
    }
    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id')->withDefault(['email' => null]);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault(['email' => null]);
    }
}
