<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'status_order',
        'status_payment',
        'total_price',
        'cart_number',
        'user_id',
        'restaurant_id'
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'cart_number', 'cart_number');
    }

    public function restaurant()
    {
        return $this->hasOne(Restaurant::class,'id','restaurant_id');
    }
}
