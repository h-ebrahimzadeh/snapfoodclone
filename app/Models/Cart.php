<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public const PENDING=1;
    public const PREPARATION=2;
    public const SEND_TO_DESTINATION=3;
    public const DELIVERED=4;





    protected $table = 'carts';
    protected $fillable = [
        'food_id',
        'count',
        'user_id',
        'price',
        'cart_number',

    ];

    public function foods()
    {
        return $this->hasMany(Food::class, 'id', 'food_id');
    }





}
