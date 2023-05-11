<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable=[
        'name',
        'restaurant_categories_id',
        'restaurant_categories',
        'phone_number',
        'address',
        'account_number',
        'user_id',
        'latitude',
        'longitude'
    ];

    public function restaurantCategory()
    {
        return $this->hasOne(RestaurantCategory::class,'id','restaurant_categories_id');
    }

    public function addresses()
    {
        return $this->hasMany(AddressRestaurant::class, 'restaurant_id', 'id');
    }

    public function foods()
    {
        return $this->hasManyThrough(Food::class,Cart::class);
    }

    public function cart()
    {
        return $this->hasManyThrough(Cart::class,Food::class);
    }
}
