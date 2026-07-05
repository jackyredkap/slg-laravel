<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'total_price'
    ];

    // รายการสินค้าในออเดอร์
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}