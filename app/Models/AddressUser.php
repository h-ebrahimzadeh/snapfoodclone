<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressUser extends Model
{
    use HasFactory;
    protected $table='addresses_user';

    protected $fillable=[
        'title',
        'address',
        'latitude',
        'longitude',
        'user_id',
        'timestamps'

    ];
}
