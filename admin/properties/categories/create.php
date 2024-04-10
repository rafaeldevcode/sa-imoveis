<?php

verifyMethod(500, 'POST');

use Src\Models\Category;

$requests = requests();

$category = new Category();

$slug = normalizeSlug($requests->slug);

$category->create([
    'name' => $requests->name,
    'slug' => $slug,
]);

session([
    'message' => __('Category added successfully!'),
    'type' => 'success',
]);

return header(route('/admin/categories', true), true, 302);
