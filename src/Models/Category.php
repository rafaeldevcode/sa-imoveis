<?php

namespace Src\Models;

class Category extends Model
{
    public $table = 'categories';

    public function properties(): Property
    {
        return $this->hasMany(Property::class, 'properties', 'category_id');
    }
}
