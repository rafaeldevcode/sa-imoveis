<?php

verifyMethod(500, 'POST');

use Src\Models\Property;

$requests = requests();
$property = new Property();

$status = isset($requests->status) ? $requests->status : 'off';
$collection = isset($requests->collection) ? $requests->collection : null;

$property = $property->find($requests->id);

$property->update([
    'name' => $requests->name,
    'description' => $requests->description,
    'code' => $requests->code,
    'value' => $requests->value,
    'condominium' => $requests->condominium,
    'iptu' => $requests->iptu,
    'andress' => $requests->andress,
    'location' => $requests->location,
    'details' => json_encode(getDetails($requests)),
    'videos' => json_encode($requests->videos),
    'characteristics' => json_encode($requests->characteristics),
    'status' => $status,
    'category_id' => $requests->category_id,
]);

$property->images()->sync($collection);

session([
    'message' => __('Property edited successfully!'),
    'type' => 'success',
]);

return header(route('/admin/properties', true), true, 302);
