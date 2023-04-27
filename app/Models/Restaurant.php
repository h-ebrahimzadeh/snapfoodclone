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
        'account_number'
    ];

    public function restaurantCategory()
    {
        return $this->hasOne(RestaurantCategory::class,'id','restaurant_categories_id');
    }
}
