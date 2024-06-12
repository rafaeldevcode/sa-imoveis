<?php

namespace Src\Models;

class PropertyView extends Model
{
    public $table = 'property_views';

    public function property(): Property
    {
        return $this->belongsTo(Property::class, 'properties', 'property_id');
    }
}
