<?php

verifyMethod(405, 'POST');

use Src\Models\Property;
use Src\Models\PropertyImages;

$property = new Property();
$galery = new PropertyImages();

$requests = requests();

foreach ($requests->ids as $ID) {
    $property->find($ID)->delete();
    $galery->where('property_id', '=', $ID)->delete();
}

session([
    'message' => __('Property(ies) removed successfully!'),
    'type' => 'success',
]);

return header(route('/admin/properties', true), true, 302);
