<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $fillable=[
        'cart_id',
        'content',
        'score',
        'user_id',
        'name'

    ];

}
