<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = true;

    use HasFactory;

    protected $fillable=[
        'cart_id',
        'content',
        'score',
        'user_id',
        'title',
        'request_delete',
        'order_id',
        'timestamps'

    ];

    public function replies()
    {
        return $this->hasMany(Reply::class,'comment_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
