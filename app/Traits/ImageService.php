<?php

namespace App\Traits;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait ImageService
{
    function __construct()
    {
    }
    function updateImage($image)
    {

        if ($this->getFirstMediaUrl('item_image') != null) {
            $this->getFirstMedia('item_image')->delete();
        }
        $this->addMedia($image)->toMediaCollection('item_image');
    }
}
