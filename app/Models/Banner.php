<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'image',
        'selected'
    ];

    public function getBannerImageUrlAttribute()
    {
        return Storage::disk('snap-food')->url($this->image);
    }
}
