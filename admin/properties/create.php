<?php

verifyMethod(405, 'POST');

use Src\Models\Property;

$requests = requests();
$property = new Property();

$status = isset($requests->status) ? $requests->status : 'off';
$collection = isset($requests->collection) ? $requests->collection : null;

$newProperty = $property->create([
    'name' => $requests->name,
    'description' => $requests->description,
    'code' => $requests->code,
    'value' => $requests->value,
    'condominium' => $requests->condominium,
    'iptu' => $requests->iptu,
    'andress' => $requests->andress,
    'location' => $requests->location,
    'details' => json_encode(getDetails($requests)),
    'videos' => isset($requests->videos) ? json_encode($requests->videos) : null,
    'characteristics' => isset($requests->characteristics) ? json_encode($requests->characteristics) : null,
    'status' => $status,
    'user_id' => $_SESSION['user_id'],
    'category_id' => $requests->category_id,
]);

$property->find($newProperty->id)->images()->sync($collection);

session([
    'message' => __('Property added successfully!'),
    'type' => 'success',
]);

return header(route('/admin/properties', true), true, 302);
