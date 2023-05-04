<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressRestaurant extends Model
{
    use HasFactory;
    protected $table='addresses_restaurant';

    protected $fillable=[
        'title',
        'address',
        'latitude',
        'longitude',
        'user_id',
        'timestamps'

    ];
}
