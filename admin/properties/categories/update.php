<?php

verifyMethod(500, 'POST');

verifyMethod(500, 'POST');

use Src\Models\Category;

$requests = requests();

$category = new Category();

$slug = normalizeSlug($requests->slug);

$category->find($requests->id)->update([
    'name' => $requests->name,
    'slug' => $slug,
]);

session([
    'message' => __('Category edited successfully!'),
    'type' => 'success',
]);

return header(route('/admin/categories', true), true, 302);
