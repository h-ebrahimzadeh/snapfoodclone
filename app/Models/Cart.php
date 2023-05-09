<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable=[
        'food_id',
        'count',
        'user_id'
    ];

    public function foods()
    {
        return $this->hasMany(Food::class,'id','food_id');
    }
}
