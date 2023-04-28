<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'food_categories_id',
        'marerials',
        'image',
        'price',
        'coupon_id',
        'food_parties_id',
        'restaurant_id'

    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class,'id','restaurant_id');
    }

    public function foodParty()
    {
        return $this->hasOne(FoodParty::class,'id','food_parties_id');
    }

    public function coupon()
    {
        return $this->hasOne(Coupon::class,'id','coupon_id');
    }

    public function foodCategory()
    {
        return $this->hasOne(FoodCategory::class,'id','food_categories_id');
    }

}
