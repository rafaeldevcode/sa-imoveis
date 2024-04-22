<?php

namespace Src\Models;

class Gallery extends Model
{
    public $table = 'gallery';

    public function properties(): Property
    {
        return $this->belongsToMany(Property::class, 'property_images', 'image_id', 'property_id');
    }
}
