<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use App\Traits\ImageService;
use Spatie\MediaLibrary\InteractsWithMedia;

class Item extends Model  implements HasMedia
{
    use HasFactory, InteractsWithMedia, ImageService;
    protected $fillable = [
        'name',
        'category_id',
        'price_per_unit',
        'discount'     
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
