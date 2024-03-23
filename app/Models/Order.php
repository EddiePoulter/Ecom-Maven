<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'total_price', 'status', 'created_by', 'updated_by',
    ];

    // Define relationships if necessary
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}