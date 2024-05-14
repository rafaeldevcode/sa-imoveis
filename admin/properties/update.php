<?php

verifyMethod(405, 'POST');

use Src\Models\Property;

$requests = requests();
$property = new Property();

$collection = isset($requests->collection) ? $requests->collection : null;
$isLaunch = isset($requests->is_launch) ? $requests->is_launch : 'off';
$property = $property->find($requests->id);

$property->update([
    'name' => $requests->name,
    'description' => $requests->description,
    'value' => str_replace(['.', ','], ['', '.'], $requests->value),
    'condominium' => empty($requests->condominium) ? null : str_replace(['.', ','], ['', '.'], $requests->condominium),
    'iptu' => empty($requests->iptu) ? null : str_replace(['.', ','], ['', '.'], $requests->iptu),
    'andress' => $requests->andress,
    'location' => $requests->location,
    'details' => json_encode(getDetails($requests)),
    'videos' => isset($requests->videos) ? json_encode($requests->videos) : null,
    'characteristics' => isset($requests->characteristics) ? json_encode($requests->characteristics) : null,
    'status' => $requests->status,
    'type' => $requests->type,
    'is_launch' => $isLaunch,
    'category_id' => $requests->category_id,
]);

$property->images()->sync($collection);

session([
    'message' => __('Property edited successfully!'),
    'type' => 'success',
]);

return header(route('/admin/properties', true), true, 302);
