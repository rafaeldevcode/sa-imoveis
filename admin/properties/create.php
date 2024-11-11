<?php

verifyMethod(405, 'POST');

use Src\Models\Property;

$requests = requests();
$property = new Property();

$collection = isset($requests->collection) ? $requests->collection : null;
$isLaunch = isset($requests->is_launch) ? $requests->is_launch : 'off';
$isHighlighted = isset($requests->is_highlighted) ? $requests->is_highlighted : 'off';

$newProperty = $property->create([
    'name' => $requests->name,
    'description' => $requests->description,
    'code' => generatePropertyCode(),
    'value' => empty($requests->value) ? null : str_replace(['.', ','], ['', '.'], $requests->value),
    'condominium' => empty($requests->condominium) ? null : str_replace(['.', ','], ['', '.'], $requests->condominium),
    'iptu' => empty($requests->iptu) ? null : str_replace(['.', ','], ['', '.'], $requests->iptu),
    'andress' => $requests->andress,
    'location' => $requests->location,
    'details' => json_encode(getDetails($requests)),
    'videos' => isset($requests->videos) ? json_encode($requests->videos) : null,
    'characteristics' => isset($requests->characteristics) ? json_encode($requests->characteristics) : null,
    'status' => $requests->status,
    'progress' => $requests->progress,
    'city' => $requests->city,
    'type' => $requests->type,
    'is_launch' => $isLaunch,
    'is_highlighted' => $isHighlighted,
    'user_id' => $_COOKIE['user_id'],
    'category_id' => $requests->category_id,
    'dimension' => $requests->dimension,
    'show_card' => $requests->show_card,
]);

$property->find($newProperty->id)->images()->sync($collection);

session([
    'message' => __('Property added successfully!'),
    'type' => 'success',
]);

return header(route('/admin/properties', true), true, 302);
