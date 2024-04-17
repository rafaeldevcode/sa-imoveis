<?php

namespace Src\Models;

class Property extends Model
{
    public $table = 'properties';

    public function images(): Gallery
    {
        return $this->belongsToMany(Gallery::class, 'property_images', 'property_id', 'image_id');
    }

    public function category(): User
    {
        return $this->belongsTo(User::class, 'categories', 'category_id');
    }

    public function user(): User
    {
        return $this->belongsTo(User::class, 'users', 'user_id');
    }
}
